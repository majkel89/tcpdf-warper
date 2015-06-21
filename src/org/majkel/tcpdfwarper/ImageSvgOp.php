<?php
/**
 * Created by Generator.
 * Package: org\majkel\tcpdfwarper
 * User: Michał (majkel) Kowalik <maf.michal@gmail.com>
 * Date: 2015-06-21
 * Time: 21:02:59
 */

namespace org\majkel\tcpdfwarper;

/**
 * Class ImageSvgOp
 * @package org\majkel\tcpdfwarper
 *
 * Embedd a Scalable Vector Graphics (SVG) image.
 * NOTE: SVG standard is not yet fully implemented, use the setRasterizeVectorImages() method to enable/disable rasterization of vector images using ImageMagick library.
 *
 * @property string $file Name of the SVG file or a '@' character followed by the SVG data string.
 * @property float $x Abscissa of the upper-left corner.
 * @property float $y Ordinate of the upper-left corner.
 * @property float $w Width of the image in the page. If not specified or equal to zero, it is automatically calculated.
 * @property float $h Height of the image in the page. If not specified or equal to zero, it is automatically calculated.
 * @property mixed $link URL or identifier returned by AddLink().
 * @property string $align Indicates the alignment of the pointer next to image insertion relative to image height. The value can be:<ul><li>T: top-right for LTR or top-left for RTL</li><li>M: middle-right for LTR or middle-left for RTL</li><li>B: bottom-right for LTR or bottom-left for RTL</li><li>N: next line</li></ul> If the alignment is an empty string, then the pointer will be restored on the starting SVG position.
 * @property string $palign Allows to center or align the image on the current line. Possible values are:<ul><li>L : left align</li><li>C : center</li><li>R : right align</li><li>'' : empty string : left for LTR or right for RTL</li></ul>
 * @property mixed $border Indicates if borders must be drawn around the cell. The value can be a number:<ul><li>0: no border (default)</li><li>1: frame</li></ul> or a string containing some or all of the following characters (in any order):<ul><li>L: left</li><li>T: top</li><li>R: right</li><li>B: bottom</li></ul> or an array of line styles for each border group - for example: array('LTRB' => array('width' => 2, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)))
 * @property boolean $fitonpage if true the image is resized to not exceed page dimensions.
 *
 * @method ImageSvgOp setFile(string $file) Name of the SVG file or a '@' character followed by the SVG data string.
 * @method ImageSvgOp setX(float $x) Abscissa of the upper-left corner.
 * @method ImageSvgOp setY(float $y) Ordinate of the upper-left corner.
 * @method ImageSvgOp setW(float $w) Width of the image in the page. If not specified or equal to zero, it is automatically calculated.
 * @method ImageSvgOp setH(float $h) Height of the image in the page. If not specified or equal to zero, it is automatically calculated.
 * @method ImageSvgOp setLink(mixed $link) URL or identifier returned by AddLink().
 * @method ImageSvgOp setAlign(string $align) Indicates the alignment of the pointer next to image insertion relative to image height. The value can be:<ul><li>T: top-right for LTR or top-left for RTL</li><li>M: middle-right for LTR or middle-left for RTL</li><li>B: bottom-right for LTR or bottom-left for RTL</li><li>N: next line</li></ul> If the alignment is an empty string, then the pointer will be restored on the starting SVG position.
 * @method ImageSvgOp setPalign(string $palign) Allows to center or align the image on the current line. Possible values are:<ul><li>L : left align</li><li>C : center</li><li>R : right align</li><li>'' : empty string : left for LTR or right for RTL</li></ul>
 * @method ImageSvgOp setBorder(mixed $border) Indicates if borders must be drawn around the cell. The value can be a number:<ul><li>0: no border (default)</li><li>1: frame</li></ul> or a string containing some or all of the following characters (in any order):<ul><li>L: left</li><li>T: top</li><li>R: right</li><li>B: bottom</li></ul> or an array of line styles for each border group - for example: array('LTRB' => array('width' => 2, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)))
 * @method ImageSvgOp setFitonpage(boolean $fitonpage) if true the image is resized to not exceed page dimensions.
 *
 * @method string getFile() Name of the SVG file or a '@' character followed by the SVG data string.
 * @method float getX() Abscissa of the upper-left corner.
 * @method float getY() Ordinate of the upper-left corner.
 * @method float getW() Width of the image in the page. If not specified or equal to zero, it is automatically calculated.
 * @method float getH() Height of the image in the page. If not specified or equal to zero, it is automatically calculated.
 * @method mixed getLink() URL or identifier returned by AddLink().
 * @method string getAlign() Indicates the alignment of the pointer next to image insertion relative to image height. The value can be:<ul><li>T: top-right for LTR or top-left for RTL</li><li>M: middle-right for LTR or middle-left for RTL</li><li>B: bottom-right for LTR or bottom-left for RTL</li><li>N: next line</li></ul> If the alignment is an empty string, then the pointer will be restored on the starting SVG position.
 * @method string getPalign() Allows to center or align the image on the current line. Possible values are:<ul><li>L : left align</li><li>C : center</li><li>R : right align</li><li>'' : empty string : left for LTR or right for RTL</li></ul>
 * @method mixed getBorder() Indicates if borders must be drawn around the cell. The value can be a number:<ul><li>0: no border (default)</li><li>1: frame</li></ul> or a string containing some or all of the following characters (in any order):<ul><li>L: left</li><li>T: top</li><li>R: right</li><li>B: bottom</li></ul> or an array of line styles for each border group - for example: array('LTRB' => array('width' => 2, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)))
 * @method boolean getFitonpage() if true the image is resized to not exceed page dimensions.
 *
 * @method void write()
 * @method void render()
 */
class ImageSvgOp extends AbstractOp {

	/**
	 * @var array
	 */
	protected static $defaultArguments = array(
			'file' => null,
			'x' => '',
			'y' => '',
			'w' => 0,
			'h' => 0,
			'link' => '',
			'align' => '',
			'palign' => '',
			'border' => 0,
			'fitonpage' => false,
	);

	/**
	 * @var string
	 */
	protected static $method = 'ImageSvg';

	/**
	 * @return void
	 */
	public function put() {
		$this->assertArgExists('file');
		parent::put();
	}

	/**
	 * Sets position.
	 * @param float $x Abscissa of the upper-left corner.
	 * @param float $y Ordinate of the upper-left corner.
	 * @return ImageSvgOp
	 */
	public function setXY($x, $y) {
		return $this->setX($x)->setY($y);
	}

	/**
	 * Sets position.
	 * @param float $x Abscissa of the upper-left corner.
	 * @param float $y Ordinate of the upper-left corner.
	 * @return ImageSvgOp
	 */
	public function setPos($x, $y) {
		return $this->setX($x)->setY($y);
	}

	/**
	 * Sets size.
	 * @param float $w Width of the image in the page. If not specified or equal to zero, it is automatically calculated.
	 * @param float $h Height of the image in the page. If not specified or equal to zero, it is automatically calculated.
	 * @return ImageSvgOp
	 */
	public function setWH($w, $h) {
		return $this->setW($w)->setH($h);
	}

	/**
	 * Sets size.
	 * @param float $w Width of the image in the page. If not specified or equal to zero, it is automatically calculated.
	 * @param float $h Height of the image in the page. If not specified or equal to zero, it is automatically calculated.
	 * @return ImageSvgOp
	 */
	public function setSize($w, $h) {
		return $this->setW($w)->setH($h);
	}

}
