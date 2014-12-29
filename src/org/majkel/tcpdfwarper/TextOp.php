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
 * @property int $x
 * @property int $y
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
 * @property boolean $fstroke
 * @property boolean $fclip
 * @property boolean $ffill
 * @property boolean $rtloff
 *
 * @method TextOp setX(int $x)
 * @method TextOp setY(int $y)
 * @method TextOp setTxt(string $txt)
 * @method TextOp setBorder(int $border)
 * @method TextOp setLn(int $ln)
 * @method TextOp setAlign(string $align)
 * @method TextOp setFill(boolean $fill)
 * @method TextOp setLink(string $link)
 * @method TextOp setStretch(int $stretch)
 * @method TextOp setIgnoreMinHeight(boolean $ignoreMinHeight)
 * @method TextOp setCalign(string $calign)
 * @method TextOp setValign(string $valign)
 * @method TextOp setFstroke(boolean $fstroke)
 * @method TextOp setFclip(boolean $fclip)
 * @method TextOp setFfill(boolean $ffill)
 * @method TextOp setRtloff(boolean $rtloff)
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
