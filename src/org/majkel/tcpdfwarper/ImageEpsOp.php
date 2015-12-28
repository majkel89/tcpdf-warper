<?php
/**
 * Created by Generator.
 * Package: org\majkel\tcpdfwarper
 * User: Michał (majkel) Kowalik <maf.michal@gmail.com>
 * Date: 2015-12-28
 * Time: 22:28:03
 */

namespace org\majkel\tcpdfwarper;

/**
 * Class ImageEpsOp
 * @package org\majkel\tcpdfwarper
 *
 * Embed vector-based Adobe Illustrator (AI) or AI-compatible EPS files.
 * NOTE: EPS is not yet fully implemented, use the setRasterizeVectorImages() method to enable/disable rasterization of vector images using ImageMagick library.
 * Only vector drawing is supported, not text or bitmap.
 * Although the script was successfully tested with various AI format versions, best results are probably achieved with files that were exported in the AI3 format (tested with Illustrator CS2, Freehand MX and Photoshop CS2).
 *
 * @property string $file Name of the file containing the image or a '@' character followed by the EPS/AI data string.
 * @property float $x Abscissa of the upper-left corner.
 * @property float $y Ordinate of the upper-left corner.
 * @property float $w Width of the image in the page. If not specified or equal to zero, it is automatically calculated.
 * @property float $h Height of the image in the page. If not specified or equal to zero, it is automatically calculated.
 * @property mixed $link URL or identifier returned by AddLink().
 * @property boolean $useBoundingBox specifies whether to position the bounding box (true) or the complete canvas (false) at location (x,y). Default value is true.
 * @property string $align Indicates the alignment of the pointer next to image insertion relative to image height. The value can be:<ul><li>T: top-right for LTR or top-left for RTL</li><li>M: middle-right for LTR or middle-left for RTL</li><li>B: bottom-right for LTR or bottom-left for RTL</li><li>N: next line</li></ul>
 * @property string $palign Allows to center or align the image on the current line. Possible values are:<ul><li>L : left align</li><li>C : center</li><li>R : right align</li><li>'' : empty string : left for LTR or right for RTL</li></ul>
 * @property mixed $border Indicates if borders must be drawn around the cell. The value can be a number:<ul><li>0: no border (default)</li><li>1: frame</li></ul> or a string containing some or all of the following characters (in any order):<ul><li>L: left</li><li>T: top</li><li>R: right</li><li>B: bottom</li></ul> or an array of line styles for each border group - for example: array('LTRB' => array('width' => 2, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)))
 * @property boolean $fitonpage if true the image is resized to not exceed page dimensions.
 * @property boolean $fixoutvals if true remove values outside the bounding box.
 *
 * @method ImageEpsOp setFile(string $file) Name of the file containing the image or a '@' character followed by the EPS/AI data string.
 * @method ImageEpsOp setX(float $x) Abscissa of the upper-left corner.
 * @method ImageEpsOp setY(float $y) Ordinate of the upper-left corner.
 * @method ImageEpsOp setW(float $w) Width of the image in the page. If not specified or equal to zero, it is automatically calculated.
 * @method ImageEpsOp setH(float $h) Height of the image in the page. If not specified or equal to zero, it is automatically calculated.
 * @method ImageEpsOp setLink(mixed $link) URL or identifier returned by AddLink().
 * @method ImageEpsOp setUseBoundingBox(boolean $useBoundingBox) specifies whether to position the bounding box (true) or the complete canvas (false) at location (x,y). Default value is true.
 * @method ImageEpsOp setAlign(string $align) Indicates the alignment of the pointer next to image insertion relative to image height. The value can be:<ul><li>T: top-right for LTR or top-left for RTL</li><li>M: middle-right for LTR or middle-left for RTL</li><li>B: bottom-right for LTR or bottom-left for RTL</li><li>N: next line</li></ul>
 * @method ImageEpsOp setPalign(string $palign) Allows to center or align the image on the current line. Possible values are:<ul><li>L : left align</li><li>C : center</li><li>R : right align</li><li>'' : empty string : left for LTR or right for RTL</li></ul>
 * @method ImageEpsOp setBorder(mixed $border) Indicates if borders must be drawn around the cell. The value can be a number:<ul><li>0: no border (default)</li><li>1: frame</li></ul> or a string containing some or all of the following characters (in any order):<ul><li>L: left</li><li>T: top</li><li>R: right</li><li>B: bottom</li></ul> or an array of line styles for each border group - for example: array('LTRB' => array('width' => 2, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)))
 * @method ImageEpsOp setFitonpage(boolean $fitonpage) if true the image is resized to not exceed page dimensions.
 * @method ImageEpsOp setFixoutvals(boolean $fixoutvals) if true remove values outside the bounding box.
 *
 * @method string getFile() Name of the file containing the image or a '@' character followed by the EPS/AI data string.
 * @method float getX() Abscissa of the upper-left corner.
 * @method float getY() Ordinate of the upper-left corner.
 * @method float getW() Width of the image in the page. If not specified or equal to zero, it is automatically calculated.
 * @method float getH() Height of the image in the page. If not specified or equal to zero, it is automatically calculated.
 * @method mixed getLink() URL or identifier returned by AddLink().
 * @method boolean getUseBoundingBox() specifies whether to position the bounding box (true) or the complete canvas (false) at location (x,y). Default value is true.
 * @method string getAlign() Indicates the alignment of the pointer next to image insertion relative to image height. The value can be:<ul><li>T: top-right for LTR or top-left for RTL</li><li>M: middle-right for LTR or middle-left for RTL</li><li>B: bottom-right for LTR or bottom-left for RTL</li><li>N: next line</li></ul>
 * @method string getPalign() Allows to center or align the image on the current line. Possible values are:<ul><li>L : left align</li><li>C : center</li><li>R : right align</li><li>'' : empty string : left for LTR or right for RTL</li></ul>
 * @method mixed getBorder() Indicates if borders must be drawn around the cell. The value can be a number:<ul><li>0: no border (default)</li><li>1: frame</li></ul> or a string containing some or all of the following characters (in any order):<ul><li>L: left</li><li>T: top</li><li>R: right</li><li>B: bottom</li></ul> or an array of line styles for each border group - for example: array('LTRB' => array('width' => 2, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)))
 * @method boolean getFitonpage() if true the image is resized to not exceed page dimensions.
 * @method boolean getFixoutvals() if true remove values outside the bounding box.
 *
 * @method void write()
 * @method void render()
 */
class ImageEpsOp extends AbstractOp {

	/**
	 * @return array
	 */
	protected function getDefaultArguments() {
		return array(
			'file' => null,
			'x' => '',
			'y' => '',
			'w' => 0,
			'h' => 0,
			'link' => '',
			'useBoundingBox' => true,
			'align' => '',
			'palign' => '',
			'border' => 0,
			'fitonpage' => false,
			'fixoutvals' => false,
		);
	}

	/**
	 * @return string
	 */
	protected function getMethod() {
		return 'ImageEps';
	}

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
	 * @return ImageEpsOp
	 */
	public function setXY($x, $y) {
		return $this->setX($x)->setY($y);
	}

	/**
	 * Sets position.
	 * @param float $x Abscissa of the upper-left corner.
	 * @param float $y Ordinate of the upper-left corner.
	 * @return ImageEpsOp
	 */
	public function setPos($x, $y) {
		return $this->setX($x)->setY($y);
	}

	/**
	 * Sets size.
	 * @param float $w Width of the image in the page. If not specified or equal to zero, it is automatically calculated.
	 * @param float $h Height of the image in the page. If not specified or equal to zero, it is automatically calculated.
	 * @return ImageEpsOp
	 */
	public function setWH($w, $h) {
		return $this->setW($w)->setH($h);
	}

	/**
	 * Sets size.
	 * @param float $w Width of the image in the page. If not specified or equal to zero, it is automatically calculated.
	 * @param float $h Height of the image in the page. If not specified or equal to zero, it is automatically calculated.
	 * @return ImageEpsOp
	 */
	public function setSize($w, $h) {
		return $this->setW($w)->setH($h);
	}

}
