<?php
/**
 * Created by PhpStorm.
 * User: Michał (majkel) Kowalik <maf.michal@gmail.com>
 * Date: 1/17/2015
 * Time: 20:44
 */

namespace org\majkel\tcpdfwarper\generator;

/**
 * Class Generator
 * @package org\majkel\tcpdfwarper\generator
 */
class Generator {

	/** @var string */
	protected $configFile;
	/** @var string */
	protected $classTemplateFile;
	/** @var string */
	protected $traitTemplateFile;

	/** @var array */
	protected $config;

	/** @var string */
	protected $date;
	/** @var string */
	protected $time;

	/**
	 * @param array $config
	 */
	public function __construct($config) {
		$this->configFile = $config['configFile'];
		$this->classTemplateFile = $config['classTemplateFile'];
		$this->traitTemplateFile = $config['traitTemplateFile'];
		$now = time();
		$this->date = date('Y-m-d', $now);
		$this->time = date('H:i:s', $now);
	}

	/**
	 * @return ConfigItem[]
	 * @throws GeneratorException
	 */
	protected function getConfig() {
		if (is_null($this->config)) {
			$this->config = array();
			if (!file_exists($this->configFile)) {
				throw new GeneratorException("Config file `{$this->configFile}` does not exists.");
			}
			$config = require $this->configFile;
			if (!isset($config) || !is_array($config)) {
				throw new GeneratorException("Invalid configuration file `{$this->configFile}`");
			}
			foreach ($config as $method => $classDef) {
				if (is_array($classDef)) {
					if (!is_integer($method) && !isset($classDef['method'])) {
						$classDef['method'] = $method;
					}
				}
				else {
					$classDef = array(
							'method' => $classDef,
					);
				}
				$this->config[] = ConfigItem::fromArray($classDef);
			}
		}
		return $this->config;
	}

	/**
	 * @param string $text
	 * @return string
	 */
	protected static function removeTrailingSpaces($text) {
		return rtrim(preg_replace('#[ \t]+[\r\n]#', "\n", $text), " \t\0\x0B");
	}

	/**
	 * @param ClassDefinition $class
	 * @return string
	 */
	protected function generateClass($class) {
		ob_start();
		require $this->classTemplateFile;
		$result = ob_get_contents();
		ob_end_clean();
		return self::removeTrailingSpaces($result);
	}

	/**
	 * @param ClassDefinition[] $classes
	 * @return string
	 */
	protected function generateTrait($classes) {
		ob_start();
		require $this->traitTemplateFile;
		$result = ob_get_contents();
		ob_end_clean();
		return self::removeTrailingSpaces($result);
	}

	/**
	 * @param string $outputDirectory
	 * @throws GeneratorException
	 */
	public function generate($outputDirectory) {
		if (!is_dir($outputDirectory)) {
			throw new GeneratorException("`$outputDirectory` is not valid directory");
		}
		$classes = array();
		$config = $this->getConfig();
		foreach ($config as $classDef) {
			$class = ClassDefinition::fromConfigItem($classDef);
			$classes[] = $class;
			file_put_contents($outputDirectory.'/'.$classDef->className.'.php', $this->generateClass($class));
		}
		file_put_contents($outputDirectory.'/TCPDFWarperTrait.php', $this->generateTrait($classes));
	}

}
