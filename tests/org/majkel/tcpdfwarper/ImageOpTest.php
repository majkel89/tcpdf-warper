<?php
/**
 * Created by PhpStorm.
 * User: Michał (majkel) Kowalik <maf.michal@gmail.com>
 * Date: 12/28/2014
 * Time: 20:41
 */

namespace org\majkel\tcpdfwarper;

require_once 'OpTestAbstract.php';

/**
 * Class ImageOpTest
 * @package org\majkel\tcpdfwarper
 * @coversDefaultClass \org\majkel\tcpdfwarper\ImageOp
 */
class ImageOpTest extends OpTestAbstract {

	/**
	 * @expectedException \Exception
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
		$this->_testSetWH();
	}

	/**
	 * @covers ::setSize
	 */
	public function testSetSize() {
		$this->_testSetSize();
	}

	/**
	 * @covers ::setXY
	 */
	public function testSetXY() {
		$this->_testSetXY();
	}

	/**
	 * @covers ::setPos
	 */
	public function testSetPos() {
		$this->_testSetPos();
	}

	/**
	 * @return string
	 */
	protected function getClass() {
		return '\org\majkel\tcpdfwarper\ImageOp';
	}

	/**
	 * @return string
	 */
	protected function getMethod() {
		return 'Image';
	}
}
