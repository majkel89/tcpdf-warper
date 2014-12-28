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
 * @property string $file;
 * @property int $x;
 * @property int $y;
 * @property int $w;
 * @property int $h;
 * @property int $dpi;
 * @property string $type;
 * @property string $palign;
 * @property int $border;
 * @property string $align;
 * @property string $link;
 * @property boolean $resize;
 * @property boolean $ismask;
 * @property boolean $imgmask;
 * @property boolean $fitbox;
 * @property boolean $hidden;
 * @property boolean $fitonpage;
 * @property boolean $alt;
 * @property array $altimgs;
 *
 * @method ImageOp setFile(string $file)
 * @method ImageOp setX(int $x)
 * @method ImageOp setY(int $y)
 * @method ImageOp setW(int $w)
 * @method ImageOp setH(int $h)
 * @method ImageOp setDpi(int $dpi)
 * @method ImageOp setPalign(string $palign)
 * @method ImageOp setType(string $type)
 * @method ImageOp setBorder(int $border)
 * @method ImageOp setAlign(string $align)
 * @method ImageOp setLink(string $link)
 * @method ImageOp setResize(boolean $resize)
 * @method ImageOp setIsmask(boolean $ismask)
 * @method ImageOp setImgmask(boolean $imgmask)
 * @method ImageOp setFitbox(boolean $fitbox)
 * @method ImageOp setHidden(boolean $hidden)
 * @method ImageOp setFitonpage(boolean $fitonpage)
 * @method ImageOp setAlt(boolean $alt)
 * @method ImageOp setAltimgs(array $altimgs)
 *
 * @method string getFile()
 * @method int getX()
 * @method int getY()
 * @method int getW()
 * @method int getH()
 * @method int getDpi()
 * @method string getType()
 * @method int getBorder()
 * @method string getAlign()
 * @method string getPalign()
 * @method string getLink()
 * @method boolean getResize()
 * @method boolean getIsmask()
 * @method boolean getImgmask()
 * @method boolean getFitbox()
 * @method boolean getHidden()
 * @method boolean getFitonpage()
 * @method boolean getAlt()
 * @method array getAltimgs()
 */
class ImageOp extends AbstractOp {

	/**
	 * @var array
	 */
	protected static $defaultArguments = array(
			'file' => null,
			'x' => '',
			'y' => '',
			'w' => 0,
			'h' => 0,
			'type' => '',
			'link' => '',
			'align' => '',
			'resize' => false,
			'dpi' => 300,
			'palign' => '',
			'ismask' => false,
			'imgmask' => false,
			'border' => 0,
			'fitbox' => false,
			'hidden' => false,
			'fitonpage' => false,
			'alt' => false,
			'altimgs' => array(),
	);

	/**
	 * @var string
	 */
	protected static $method = 'Image';

	/**
	 * @return mixed
	 */
	public function put() {
		$this->assertArgExists('file');
		return parent::put();
	}

	/**
	 * @param int $x
	 * @param int $y
	 * @return ImageOp
	 */
	public function setXY($x, $y) {
		$this->x = $x;
		$this->y = $y;
		return $this;
	}

	/**
	 * @param int $x
	 * @param int $y
	 * @return ImageOp
	 */
	public function setPos($x, $y) {
		return $this->setXY($x, $y);
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
