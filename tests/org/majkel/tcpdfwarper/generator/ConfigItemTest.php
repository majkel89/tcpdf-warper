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
 * Class ConfigItemTest
 * @package org\majkel\tcpdfwarper\generator
 * @coversDefaultClass \org\majkel\tcpdfwarper\generator\ConfigItem
 */
class ConfigItemTest extends \PHPUnit_Framework_TestCase {

	/**
	 * @covers ::fromArray
	 */
	public function testFromArray() {
		$additionalDoc = array(
				'x' => 'doc',
		);
		$obj = ConfigItem::fromArray(array(
				'method' => 1,
				'className' => 2,
				'metaMethods' => array(
						array(
								'name' => 1,
								'args' => array(2),
								'doc' => 3,
						),
				),
				'additionalDoc' => $additionalDoc,
		));
		self::assertSame(1, $obj->method);
		self::assertSame(2, $obj->name);
		self::assertSame('2Op', $obj->className);
		self::assertSame('2Op', $obj->className);
		self::assertSame($additionalDoc, $obj->additionalDoc);
	}

	/**
	 * @covers ::fromArray
	 * @expectedException \org\majkel\tcpdfwarper\generator\GeneratorException
	 */
	public function testFromArrayException() {
		$obj = ConfigItem::fromArray(array());
	}

}
