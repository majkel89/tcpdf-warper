<?php
/**
 * Created by PhpStorm.
 * Package: org\majkel\tcpdfwarper
 * User: Michał (majkel) Kowalik <maf.michal@gmail.com>
 * Date: 12/28/2014
 * Time: 22:36
 */

namespace org\majkel\tcpdfwarper;

/**
 * Class TCPDFWarperTest
 * @package org\majkel\tcpdfwarper
 * @coversDefaultClass \org\majkel\tcpdfwarper\TCPDFWarper
 */
class TCPDFWarperTest extends \PHPUnit_Framework_TestCase {

	/**
	 * @return TCPDFWarper
	 */
	protected function getWarper() {
		return new TCPDFWarper();
	}

	/**
	 * @covers ::buildMulticell
	 */
	public function testMulticell() {
		self::assertTrue($this->getWarper()->buildMulticell() instanceof MultiCellOp);
	}

	/**
	 * @covers ::buildCell
	 */
	public function testCell() {
		self::assertTrue($this->getWarper()->buildCell() instanceof CellOp);
	}

	/**
	 * @covers ::buildText
	 */
	public function testText() {
		self::assertTrue($this->getWarper()->buildText() instanceof TextOp);
	}

	/**
	 * @covers ::buildImage
	 */
	public function testImage() {
		self::assertTrue($this->getWarper()->buildImage() instanceof ImageOp);
	}

}