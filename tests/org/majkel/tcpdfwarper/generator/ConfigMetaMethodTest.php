<?php
/**
 * Created by PhpStorm.
 * Package: org\majkel\tcpdfwarper
 * User: Michał (majkel) Kowalik <maf.michal@gmail.com>
 * Date: 12/28/2014
 * Time: 22:36
 */

namespace org\majkel\tcpdfwarper\generator;

/**
 * Class ConfigMetaMethodTest
 * @package org\majkel\tcpdfwarper\generator
 * @coversDefaultClass \org\majkel\tcpdfwarper\generator\ConfigMetaMethod
 */
class ConfigMetaMethodTest extends \PHPUnit_Framework_TestCase {

	/**
	 * @covers ::fromArray
	 */
	public function testFromArray() {
		$obj = ConfigMetaMethod::fromArray(array(
				'name' => 1,
				'args' => array(2),
				'doc' => 3,
		));
		self::assertSame(1, $obj->name);
		self::assertSame(array(2), $obj->args);
		self::assertSame(3, $obj->doc);
	}

}
