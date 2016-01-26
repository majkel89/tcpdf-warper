<?php
/**
 * Created by PhpStorm.
 * User: Michał (majkel) Kowalik <maf.michal@gmail.com>
 * Date: 1/18/2015
 * Time: 19:11
 */

namespace org\majkel\tcpdfwarper\generator;

use org\majkel\tcpdfwarper\Utils;

/**
 * Class ConfigMetaMethod
 * @package org\majkel\tcpdfwarper\generator
 */
class ConfigMetaMethod {

	/** @var string */
	public $name;
	/** @var string[] */
	public $args;
	/** @var string */
	public $doc;

	/**
	 * @param array $metaMethod
	 * @return ConfigMetaMethod
	 */
	public static function fromArray($metaMethod) {
		$obj = new self();
		$obj->name = $metaMethod['name'];
		$obj->args = Utils::getKeyAsArray($metaMethod, 'args');
		$obj->doc = isset($metaMethod['doc']) ? $metaMethod['doc'] : '';
		return $obj;
	}
}
