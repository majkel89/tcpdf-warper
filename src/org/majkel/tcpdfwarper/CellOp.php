<?php
/**
 * Created by PhpStorm.
 * User: Michał (majkel) Kowalik <maf.michal@gmail.com>
 * Date: 12/28/2014
 * Time: 15:33
 */

namespace org\majkel\tcpdfwarper;

/**
 * Class Cell
 * @package org\majkel\tcpdfwarper
 *
 * @property int $w;
 * @property int $h;
 * @property string $txt;
 * @property int $border;
 * @property int $ln;
 * @property string $align;
 * @property boolean $fill;
 * @property string $link;
 * @property int $stretch;
 * @property boolean $ignoreMinHeight;
 * @property string $calign;
 * @property string $valign;
 *
 * @method ImageOp setW(int $w)
 * @method ImageOp setH(int $h)
 * @method ImageOp setTxt(string $txt)
 * @method ImageOp setBorder(int $border)
 * @method ImageOp setLn(int $ln)
 * @method ImageOp setAlign(string $align)
 * @method ImageOp setFill(boolean $fill)
 * @method ImageOp setLink(string $link)
 * @method ImageOp setStretch(int $stretch)
 * @method ImageOp setIgnoreMinHeight(boolean $ignoreMinHeight)
 * @method ImageOp setCalign(string $calign)
 * @method ImageOp setValign(string $valign)
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
