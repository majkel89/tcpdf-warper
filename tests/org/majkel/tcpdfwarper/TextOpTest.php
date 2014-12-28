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
 * Class TextOpTest
 * @package org\majkel\tcpdfwarper
 * @coversDefaultClass \org\majkel\tcpdfwarper\TextOp
 */
class TextOpTest extends OpTestAbstract {

	public function x() {
		$pdf = new \org\majkel\tcpdfwarper\TCPDFWarper();

		$pdf->Image($file, $x, $y, $w, $h, $type, $link, $align, $resize, $dpi, $palign,
				$ismaxk, $imgmask, $border, $fitbox, $hdden, $fitonpage, $alt, $altimgs);

		$pdf->buildImage()
				->setFile($file)
				->setPos(20, 20)
				->setSize(64, 64)
				->render();

		$pdf->buildImage()
				->setAlt(true)
				->setAltimgs($altimgs)
				->render();
	}

	/**
	 * @expectedException \Exception
	 * @covers ::put
	 */
	public function testPutMissingX() {
		$obj = $this->getObject();
		$obj->put();
	}

	/**
	 * @expectedException \Exception
	 * @covers ::put
	 */
	public function testPutMissingY() {
		$obj = $this->getObject();
		$obj->x = 1;
		$obj->put();
	}

	/**
	 * @expectedException \Exception
	 * @covers ::put
	 */
	public function testPutMissingTxt() {
		$obj = $this->getObject();
		$obj->x = 1;
		$obj->y = 1;
		$obj->put();
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
		return '\org\majkel\tcpdfwarper\TextOp';
	}

	/**
	 * @return string
	 */
	protected function getMethod() {
		return 'Text';
	}
}
