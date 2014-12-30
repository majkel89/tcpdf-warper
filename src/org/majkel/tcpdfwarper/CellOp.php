<?php
/**
 * Created by PhpStorm.
 * Package: org\majkel\tcpdfwarper
 * User: Michał (majkel) Kowalik <maf.michal@gmail.com>
 * Date: 12/28/2014
 * Time: 15:33
 */

namespace org\majkel\tcpdfwarper;

/**
 * Class CellOp
 * @package org\majkel\tcpdfwarper
 *
 * @property int $w
 * @property int $h
 * @property string $txt
 * @property int $border
 * @property int $ln
 * @property string $align
 * @property boolean $fill
 * @property string $link
 * @property int $stretch
 * @property boolean $ignoreMinHeight
 * @property string $calign
 * @property string $valign
 *
 * @method CellOp setW(int $w)
 * @method CellOp setH(int $h)
 * @method CellOp setTxt(string $txt)
 * @method CellOp setBorder(int $border)
 * @method CellOp setLn(int $ln)
 * @method CellOp setAlign(string $align)
 * @method CellOp setFill(boolean $fill)
 * @method CellOp setLink(string $link)
 * @method CellOp setStretch(int $stretch)
 * @method CellOp setIgnoreMinHeight(boolean $ignoreMinHeight)
 * @method CellOp setCalign(string $calign)
 * @method CellOp setValign(string $valign)
 *
 * @method int getW()
 * @method int getH()
 * @method string getTxt()
 * @method int getBorder()
 * @method int getLn()
 * @method string getAlign()
 * @method boolean getFill()
 * @method string getLink()
 * @method int getStretch()
 * @method boolean getIgnoreMinHeight()
 * @method string getCalign()
 * @method string getValign()
 */
class CellOp extends AbstractOp {

	/**
	 * @var array
	 */
	protected static $defaultArguments = array(
			'w' => null,
			'h' => 0,
			'txt' => '',
			'border' => 0,
			'ln' => 0,
			'align' => '',
			'fill' => false,
			'link' => '',
			'stretch' => 0,
			'ignoreMinHeight' => false,
			'calign' => 'T',
			'valign' => 'M',
	);

	/**
	 * @var string
	 */
	protected static $method = 'Cell';

	/**
	 * @return mixed
	 */
	public function put() {
		$this->assertArgExists('w');
		return parent::put();
	}

	/**
	 * @param int $w
	 * @param int $h
	 * @return CellOp
	 */
	public function setWH($w, $h) {
		$this->w = $w;
		$this->h = $h;
		return $this;
	}

	/**
	 * @param int $w
	 * @param int $h
	 * @return CellOp
	 */
	public function setSize($w, $h) {
		return $this->setWH($w, $h);
	}
}
