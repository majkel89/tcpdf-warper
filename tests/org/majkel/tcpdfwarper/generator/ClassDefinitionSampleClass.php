<?php
/**
 * Created by PhpStorm.
 * User: Michał (majkel) Kowalik <maf.michal@gmail.com>
 * Date: 1/19/2015
 * Time: 02:10
 */

namespace org\majkel\tcpdfwarper\generator;

/**
 * Class ClassDefinitionSampleClass
 * @package org\majkel\tcpdfwarper\generator
 */
class ClassDefinitionSampleClass {

	const TEST = 'test';

	/**
	 * Some doc
	 * is here
	 * @param $x (int) X
	 * @param $y (float) Y
	 * @param $z (string) Z
	 * @param $w (integer) W
	 * @param $arr (array) ARR
	 * @return string t
	 */
	public function test($x, $y, $z = self::TEST, $w = 1, $arr = array()) {

	}

}
