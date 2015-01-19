<?php
/**
 * Created by PhpStorm.
 * Package: org\majkel\tcpdfwarper
 * User: Michał (majkel) Kowalik <maf.michal@gmail.com>
 * Date: 12/28/2014
 * Time: 20:41
 */

namespace org\majkel\tcpdfwarper;

require_once 'OpTestAbstract.php';

/**
 * Class Barcode1dOpTest
 * @package org\majkel\tcpdfwarper
 * @coversDefaultClass \org\majkel\tcpdfwarper\Barcode1dOp
 */
class Barcode1dOpTest extends OpTestAbstract {

	/**
	 * @expectedException \org\majkel\tcpdfwarper\MissingArgException
	 * @covers ::put
	 */
	public function testPutMissingFile() {
		$obj = $this->getObject();
		$obj->put();
	}

	/**
	 * @covers ::setWH
	 */
	public function testSetWH() {
		$this->setWHTest();
	}

	/**
	 * @covers ::setSize
	 */
	public function testSetSize() {
		$this->setSizeTest();
	}

	/**
	 * @covers ::setXY
	 */
	public function testSetXY() {
		$this->setXYTest();
	}

	/**
	 * @covers ::setPos
	 */
	public function testSetPos() {
		$this->setPosTest();
	}

	/**
	 * @return string
	 */
	protected function getClass() {
		return '\org\majkel\tcpdfwarper\Barcode1dOp';
	}

	/**
	 * @return string
	 */
	protected function getMethod() {
		return 'write1DBarcode';
	}
}
