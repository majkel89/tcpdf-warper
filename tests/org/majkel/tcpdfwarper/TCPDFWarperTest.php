<?php
/**
 * Created by PhpStorm.
 * Package: org\majkel\tcpdfwarper
 * User: Michał (majkel) Kowalik <maf.michal@gmail.com>
 * Date: 12/28/2014
 * Time: 22:36
 */

namespace org\majkel\tcpdfwarper;

require_once 'AbstractTestCase.php';

/**
 * Class TCPDFWarperTest
 * @package org\majkel\tcpdfwarper
 * @coversDefaultClass \org\majkel\tcpdfwarper\TCPDFWarper
 */
class TCPDFWarperTest extends AbstractTestCase {

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

	/**
	 * @covers ::buildBarcode1d
	 */
	public function testBarcode1d() {
		self::assertTrue($this->getWarper()->buildBarcode1d() instanceof Barcode1dOp);
	}

	/**
	 * @covers ::buildBarcode2d
	 */
	public function testBarcode2d() {
		self::assertTrue($this->getWarper()->buildBarcode2d() instanceof Barcode2dOp);
	}

	/**
	 * @covers ::buildHtmlCell
	 */
	public function testHtmlCell() {
		self::assertTrue($this->getWarper()->buildHtmlCell() instanceof HtmlCellOp);
	}

	/**
	 * @covers ::buildHtml
	 */
	public function testHtml() {
		self::assertTrue($this->getWarper()->buildHtml() instanceof HtmlOp);
	}

	/**
	 * @covers ::buildImageEps
	 */
	public function testImageEps() {
		self::assertTrue($this->getWarper()->buildImageEps() instanceof ImageEpsOp);
	}

	/**
	 * @covers ::buildImageSvg
	 */
	public function testImageSvg() {
		self::assertTrue($this->getWarper()->buildImageSvg() instanceof ImageSvgOp);
	}

	/**
	 * @covers ::buildWrite
	 */
	public function testWrite() {
		self::assertTrue($this->getWarper()->buildWrite() instanceof WriteOp);
	}

}
