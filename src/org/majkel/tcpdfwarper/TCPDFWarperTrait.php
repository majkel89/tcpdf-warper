<?php
/**
 * Created by PhpStorm.
 * Package: org\majkel\tcpdfwarper
 * User: Michał (majkel) Kowalik <maf.michal@gmail.com>
 * Date: 12/28/2014
 * Time: 17:25
 */

namespace org\majkel\tcpdfwarper;

/**
 * Class TCPDFWarperTrait
 * @package org\majkel\tcpdfwarper
 */
trait TCPDFWarperTrait {

	/**
	 * @return MultiCellOp
	 */
	public function buildMulticell() {
		return new MultiCellOp($this);
	}

	/**
	 * @return CellOp
	 */
	public function buildCell() {
		return new CellOp($this);
	}

	/**
	 * @return TextOp
	 */
	public function buildText() {
		return new TextOp($this);
	}

	/**
	 * @return ImageOp
	 */
	public function buildImage() {
		return new ImageOp($this);
	}
}
