<?php
/**
 * Created by PhpStorm.
 * User: Michał (majkel) Kowalik <maf.michal@gmail.com>
 * Date: 12/28/2014
 * Time: 15:33
 */

namespace org\majkel\tcpdfwarper;

/**
 * Class MultiCell
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
 * @property string $valign;
 * @property int $x;
 * @property int $y;
 * @property boolean $reseth;
 * @property boolean $ishtml;
 * @property boolean $autopadding;
 * @property int $maxh;
 * @property boolean $fitcell;
 *
 * @method MultiCellOp setW(int $w)
 * @method MultiCellOp setH(int $h)
 * @method MultiCellOp setTxt(string $txt)
 * @method MultiCellOp setBorder(int $border)
 * @method MultiCellOp setLn(int $ln)
 * @method MultiCellOp setAlign(string $align)
 * @method MultiCellOp setFill(boolean $fill)
 * @method MultiCellOp setLink(string $link)
 * @method MultiCellOp setStretch(int $stretch)
 * @method MultiCellOp setValign(string $valign)
 * @method MultiCellOp setX(int $x)
 * @method MultiCellOp setY(int $y)
 * @method MultiCellOp setReseth(boolean $reseth)
 * @method MultiCellOp setIshtml(boolean $ishtml)
 * @method MultiCellOp setAutopadding(boolean $autopadding)
 * @method MultiCellOp setMaxh(int $maxh)
 * @method MultiCellOp setFitcell(boolean $fitcell)
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
 * @method string getValign()
 * @method int getX()
 * @method int getY()
 * @method boolean getReseth()
 * @method boolean getIshtml()
 * @method boolean getAutopadding()
 * @method int getmaxh()
 * @method boolean getFitcell()
 */
class MultiCellOp extends AbstractOp {

	/**
	 * @var array
	 */
	protected static $defaultArguments = array(
			'w' => null,
			'h' => null,
			'txt' => null,
			'border' => 0,
			'align' => 'J',
			'fill' => false,
			'ln' => 1,
			'x' => '',
			'y' => '',
			'reseth' => true,
			'stretch' => 0,
			'ishtml' => false,
			'autopadding' => true,
			'maxh' => 0,
			'valign' => 'T',
			'fitcell' => false,
	);

	/**
	 * @var string
	 */
	protected static $method = 'MultiCell';

	/**
	 * @return mixed
	 */
	public function put() {
		$this->assertArgExists('w');
		$this->assertArgExists('h');
		$this->assertArgExists('txt');
		return parent::put();
	}

	/**
	 * @param int $w
	 * @param int $h
	 * @return MultiCellOp
	 */
	public function setWH($w, $h) {
		$this->w = $w;
		$this->h = $h;
		return $this;
	}

	/**
	 * @param int $w
	 * @param int $h
	 * @return MultiCellOp
	 */
	public function setSize($w, $h) {
		return $this->setWH($w, $h);
	}

	/**
	 * @param int $x
	 * @param int $y
	 * @return MultiCellOp
	 */
	public function setXY($x, $y) {
		$this->x = $x;
		$this->y = $y;
		return $this;
	}

	/**
	 * @param int $x
	 * @param int $y
	 * @return MultiCellOp
	 */
	public function setPos($x, $y) {
		return $this->setXY($x, $y);
	}
}
