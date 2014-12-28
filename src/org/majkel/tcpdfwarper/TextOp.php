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
 * @property int $x;
 * @property int $y;
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
 * @property boolean $fstroke;
 * @property boolean $fclip;
 * @property boolean $ffill;
 * @property boolean $rtloff;
 *
 * @method ImageOp setX(int $x)
 * @method ImageOp setY(int $y)
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
 * @method ImageOp setFstroke(boolean $fstroke)
 * @method ImageOp setFclip(boolean $fclip)
 * @method ImageOp setFfill(boolean $ffill)
 * @method ImageOp setRtloff(boolean $rtloff)
 *
 * @method int getX()
 * @method int getY()
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
 * @method boolean getFstroke()
 * @method boolean getFclip()
 * @method boolean getFfill()
 * @method boolean getRtloff()
 */
class TextOp extends AbstractOp {

	/**
	 * @var array
	 */
	protected static $defaultArguments = array(
			'x' => null,
			'y' => null,
			'txt' => null,
			'fstroke' => false,
			'fclip' => false,
			'ffill' => true,
			'border' => 0,
			'ln' => 0,
			'align' => '',
			'fill' => false,
			'link' => '',
			'stretch' => 0,
			'ignoreMinHeight' => false,
			'calign' => 'T',
			'valign' => 'M',
			'rtloff' => false,
	);

	/**
	 * @var string
	 */
	protected static $method = 'Text';

	/**
	 * @return mixed
	 */
	public function put() {
		$this->assertArgExists('x');
		$this->assertArgExists('y');
		$this->assertArgExists('txt');
		return parent::put();
	}

	/**
	 * @param int $x
	 * @param int $y
	 * @return TextOp
	 */
	public function setXY($x, $y) {
		$this->x = $x;
		$this->y = $y;
		return $this;
	}

	/**
	 * @param int $x
	 * @param int $y
	 * @return TextOp
	 */
	public function setPos($x, $y) {
		return $this->setXY($x, $y);
	}
}
