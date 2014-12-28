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
 * Class MulticellOpTest
 * @package org\majkel\tcpdfwarper
 * @coversDefaultClass \org\majkel\tcpdfwarper\MulticellOp
 */
class MultiCellOpTest extends OpTestAbstract {

	/**
	 * @expectedException \Exception
	 * @covers ::put
	 */
	public function testPutMissingW() {
		$obj = $this->getObject();
		$obj->put();
	}

	/**
	 * @expectedException \Exception
	 * @covers ::put
	 */
	public function testPutMissingH() {
		$obj = $this->getObject();
		$obj->w = 0;
		$obj->put();
	}

	/**
	 * @expectedException \Exception
	 * @covers ::put
	 */
	public function testPutMissingTxt() {
		$obj = $this->getObject();
		$obj->w = 0;
		$obj->h = 0;
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
		return '\org\majkel\tcpdfwarper\MultiCellOp';
	}

	/**
	 * @return string
	 */
	protected function getMethod() {
		return 'MultiCell';
	}
}
