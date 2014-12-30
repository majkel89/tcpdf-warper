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
 * Class CellOpTest
 * @package org\majkel\tcpdfwarper
 * @coversDefaultClass \org\majkel\tcpdfwarper\CellOp
 */
class CellOpTest extends OpTestAbstract {

	/**
	 * @expectedException \org\majkel\tcpdfwarper\MissingArgException
	 * @covers ::put
	 */
	public function testPutMissingW() {
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
	 * @return string
	 */
	protected function getClass() {
		return '\org\majkel\tcpdfwarper\CellOp';
	}

	/**
	 * @return string
	 */
	protected function getMethod() {
		return 'Cell';
	}
}
