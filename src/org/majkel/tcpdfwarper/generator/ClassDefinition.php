<?php
/**
 * Created by PhpStorm.
 * User: Michał (majkel) Kowalik <maf.michal@gmail.com>
 * Date: 1/17/2015
 * Time: 20:44
 */

namespace org\majkel\tcpdfwarper\generator;

use ReflectionMethod;

/**
 * Class ClassDefinition
 * @package org\majkel\tcpdfwarper\generator
 */
class ClassDefinition {

	/** @var string */
	public $name;
	/** @var string */
	public $className;
	/** @var string */
	public $method;
	/** @var Argument[] */
	public $defaultParameters;
	/** @var Argument[] */
	public $requiredArguments;
	/** @var ClassMetaMethod[] */
	public $metaMethods;
	/** @var string[] */
	public $doc;
	/** @var string */
	public $returnType;
	/** @var string */
	public $returnDoc;

	/**
	 * @param string $name
	 * @return string
	 */
	public static function snakeToCamel($name) {
		return preg_replace_callback('#_([A-Za-z])#', function($matches){
			return strtoupper($matches[1]);
		}, trim($name, '_'));
	}

	/**
	 * @param string $comment
	 * @param int $offset
	 * @return string
	 */
	protected static function extractFromOffsetToTag($comment, $offset = 0) {
		if (preg_match('#\s+@[a-zA-Z]+\s+#', $comment, $matches, PREG_OFFSET_CAPTURE, $offset)) {
			$position = $matches[0][1];
		}
		else {
			$position = strlen($comment);
		}
		return rtrim(substr($comment, $offset, $position - $offset));
	}

	/**
	 * @param string $classDoc
	 * @return string[]
	 */
	protected static function cleanClassDoc($classDoc) {
		return preg_split('#\s*[\r\n]+\s*\*\s*#', $classDoc);
	}

	/**
	 * @param string $comment
	 * @return string
	 */
	protected static function cleanComment($comment) {
		return trim(preg_replace(array('#\s*[\r\n]+\s*\*\s*#', '#\s+#'), ' ', $comment));
	}

	/**
	 * @param string $comment
	 * @return array type, doc
	 * @throws GeneratorException
	 */
	protected function setupReturn($comment) {
		if (!preg_match('#\*\s+@return\s+(\w+)\s+#', $comment, $matches, PREG_OFFSET_CAPTURE)) {
			$this->returnDoc = '';
			$this->returnType = 'void';
		}
		else {
			$this->returnDoc = self::extractFromOffsetToTag($comment, $matches[0][1] + strlen($matches[0][0]));
			$this->returnType = $matches[1][0] ? $matches[1][0] : 'mixed';
		}
	}

	/**
	 * @param string $comment
	 * @param string $parameter
	 * @return array type, offset
	 * @throws GeneratorException
	 */
	protected static function findParam($comment, $parameter) {
		if (!preg_match('#\*\s+@param\s+(([a-zA-Z]+)\s+)?\$'
				.$parameter.'\s+\(([a-zA-Z]+)\)\s+#', $comment, $matches, PREG_OFFSET_CAPTURE))
		{
			throw new GeneratorException("Failed to math property regex");
		}
		$type = $matches[2][0] ? $matches[2][0] : $matches[3][0];
		$offset = $matches[0][1] + strlen($matches[0][0]);
		return array($type, $offset);
	}

	/**
	 * @param string $linePrefix
	 * @return string
	 */
	public function getClassDoc($linePrefix = "\n") {
		return implode($linePrefix, $this->doc);
	}

	/**
	 * @param string[] $additionalDoc
	 * @param string $class
	 * @throws GeneratorException
	 */
	protected function parse($additionalDoc, $class = '\TCPDF') {
		$method = new ReflectionMethod($class, $this->method);
		$docComment = $method->getDocComment();
		$offset = 3;

		$this->doc = self::extractFromOffsetToTag($docComment, $offset);
		$this->doc = self::cleanClassDoc($this->doc);

		$this->setupReturn($docComment);

		$parameters = $method->getParameters();

		$this->requiredArguments = array();
		$this->defaultParameters = array();

		foreach ($parameters as $parameter) {
			$name = $parameter->getName();
			$item = new Argument;
			$item->name = $this->snakeToCamel($name);
			$item->required = !$parameter->isOptional();
			if ($parameter->isDefaultValueAvailable()) {
				if ($parameter->isDefaultValueConstant()) {
					$item->value = $parameter->getDefaultValueConstantName();
				}
				else {
					$realValue = $parameter->getDefaultValue();
					$item->value = is_null($realValue) ? 'null'
							: (is_array($realValue) && empty($realValue) ? 'array()'
									: var_export($realValue, true));
				}
			}
			else {
				$this->requiredArguments[$name] = $item;
				$item->value = 'null';
			}

			list($item->type, $offset) = self::findParam($docComment, $name);
			$doc = self::extractFromOffsetToTag($docComment, $offset);
			if (isset($additionalDoc[$name])) {
				$doc .= $additionalDoc[$name];
			}
			$item->doc = self::cleanComment($doc);

			$this->defaultParameters[$name] = $item;
		}
	}

	/**
	 * @param ConfigMetaMethod[] $metaMethodsConfig
	 * @throws GeneratorException
	 */
	protected function generateMetaMethods($metaMethodsConfig) {
		$this->metaMethods = array();
		foreach ($metaMethodsConfig as $methodConfig) {
			$item = new ClassMetaMethod();
			$item->doc = $methodConfig->doc;
			$item->name = $methodConfig->name;
			$item->arguments = array();
			foreach ($methodConfig->args as $arg) {
				if (!isset($this->defaultParameters[$arg])) {
					throw new GeneratorException("Argument `$arg` does not exists.");
				}
				$item->arguments[$arg] = $this->defaultParameters[$arg];
			}
			$this->metaMethods[] = $item;
		}
	}

	/**
	 * @return ClassDefinition
	 */
	protected static function newSelf() {
		return new static();
	}

	/**
	 * @param ConfigItem $config
	 * @return ClassDefinition
	 */
	public static function fromConfigItem(ConfigItem $config) {
		$class = static::newSelf();
		$class->name = $config->name;
		$class->className = $config->className;
		$class->method = $config->method;
		$class->parse($config->additionalDoc);
		$class->generateMetaMethods($config->metaMethods);
		return $class;
	}

}
