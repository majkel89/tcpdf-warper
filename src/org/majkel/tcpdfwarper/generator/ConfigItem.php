<?php
/**
 * Created by PhpStorm.
 * User: Michał (majkel) Kowalik <maf.michal@gmail.com>
 * Date: 1/17/2015
 * Time: 20:44
 */

namespace org\majkel\tcpdfwarper\generator;

/**
 * Class ConfigItem
 * @package org\majkel\tcpdfwarper\generator
 */
class ConfigItem {

	/** @var string */
	public $name;
	/** @var string */
	public $method;
	/** @var string */
	public $className;
	/** @var ConfigMetaMethod[] */
	public $metaMethods;
	/** @var string[] */
	public $additionalDoc;

	/**
	 * @param $array
	 * @return ConfigItem
	 * @throws GeneratorException
	 */
	public static function fromArray($array) {
		if (!isset($array['method'])) {
			throw new GeneratorException("Missing `method` key");
		}
		$obj = new static();
		$obj->method = $array['method'];
		$obj->name = isset($array['className']) ? $array['className'] : $array['method'];
		$obj->className = $obj->name.'Op';
		$obj->additionalDoc = isset($array['additionalDoc']) && is_array($array['additionalDoc'])
				? $array['additionalDoc'] : array();
		$obj->metaMethods = array();
		if (isset($array['metaMethods']) && is_array($array['metaMethods'])) {
			foreach ($array['metaMethods'] as $metaMethod) {
				$obj->metaMethods[] = ConfigMetaMethod::fromArray($metaMethod);
			}
		}
		return $obj;
	}

}
