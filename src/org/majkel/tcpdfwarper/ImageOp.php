<?php
/**
 * Created by Generator.
 * Package: org\majkel\tcpdfwarper
 * User: Michał (majkel) Kowalik <maf.michal@gmail.com>
 * Date: 2015-11-11
 * Time: 23:12:43
 */

namespace org\majkel\tcpdfwarper;

/**
 * Class ImageOp
 * @package org\majkel\tcpdfwarper
 *
 * Puts an image in the page.
 * The upper-left corner must be given.
 * The dimensions can be specified in different ways:<ul>
 * <li>explicit width and height (expressed in user unit)</li>
 * <li>one explicit dimension, the other being calculated automatically in order to keep the original proportions</li>
 * <li>no explicit dimension, in which case the image is put at 72 dpi</li></ul>
 * Supported formats are JPEG and PNG images whitout GD library and all images supported by GD: GD, GD2, GD2PART, GIF, JPEG, PNG, BMP, XBM, XPM;
 * The format can be specified explicitly or inferred from the file extension.<br />
 * It is possible to put a link on the image.<br />
 * Remark: if an image is used several times, only one copy will be embedded in the file.<br />
 *
 * @property string $file Name of the file containing the image or a '@' character followed by the image data string. To link an image without embedding it on the document, set an asterisk character before the URL (i.e.: '*http://www.example.com/image.jpg').
 * @property float $x Abscissa of the upper-left corner (LTR) or upper-right corner (RTL).
 * @property float $y Ordinate of the upper-left corner (LTR) or upper-right corner (RTL).
 * @property float $w Width of the image in the page. If not specified or equal to zero, it is automatically calculated.
 * @property float $h Height of the image in the page. If not specified or equal to zero, it is automatically calculated.
 * @property string $type Image format. Possible values are (case insensitive): JPEG and PNG (whitout GD library) and all images supported by GD: GD, GD2, GD2PART, GIF, JPEG, PNG, BMP, XBM, XPM;. If not specified, the type is inferred from the file extension.
 * @property mixed $link URL or identifier returned by AddLink().
 * @property string $align Indicates the alignment of the pointer next to image insertion relative to image height. The value can be:<ul><li>T: top-right for LTR or top-left for RTL</li><li>M: middle-right for LTR or middle-left for RTL</li><li>B: bottom-right for LTR or bottom-left for RTL</li><li>N: next line</li></ul>
 * @property mixed $resize If true resize (reduce) the image to fit $w and $h (requires GD or ImageMagick library); if false do not resize; if 2 force resize in all cases (upscaling and downscaling).
 * @property int $dpi dot-per-inch resolution used on resize
 * @property string $palign Allows to center or align the image on the current line. Possible values are:<ul><li>L : left align</li><li>C : center</li><li>R : right align</li><li>'' : empty string : left for LTR or right for RTL</li></ul>
 * @property boolean $ismask true if this image is a mask, false otherwise
 * @property mixed $imgmask image object returned by this function or false
 * @property mixed $border Indicates if borders must be drawn around the cell. The value can be a number:<ul><li>0: no border (default)</li><li>1: frame</li></ul> or a string containing some or all of the following characters (in any order):<ul><li>L: left</li><li>T: top</li><li>R: right</li><li>B: bottom</li></ul> or an array of line styles for each border group - for example: array('LTRB' => array('width' => 2, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)))
 * @property mixed $fitbox If not false scale image dimensions proportionally to fit within the ($w, $h) box. $fitbox can be true or a 2 characters string indicating the image alignment inside the box. The first character indicate the horizontal alignment (L = left, C = center, R = right) the second character indicate the vertical algnment (T = top, M = middle, B = bottom).
 * @property boolean $hidden If true do not display the image.
 * @property boolean $fitonpage If true the image is resized to not exceed page dimensions.
 * @property boolean $alt If true the image will be added as alternative and not directly printed (the ID of the image will be returned).
 * @property array $altimgs Array of alternate images IDs. Each alternative image must be an array with two values: an integer representing the image ID (the value returned by the Image method) and a boolean value to indicate if the image is the default for printing.
 *
 * @method ImageOp setFile(string $file) Name of the file containing the image or a '@' character followed by the image data string. To link an image without embedding it on the document, set an asterisk character before the URL (i.e.: '*http://www.example.com/image.jpg').
 * @method ImageOp setX(float $x) Abscissa of the upper-left corner (LTR) or upper-right corner (RTL).
 * @method ImageOp setY(float $y) Ordinate of the upper-left corner (LTR) or upper-right corner (RTL).
 * @method ImageOp setW(float $w) Width of the image in the page. If not specified or equal to zero, it is automatically calculated.
 * @method ImageOp setH(float $h) Height of the image in the page. If not specified or equal to zero, it is automatically calculated.
 * @method ImageOp setType(string $type) Image format. Possible values are (case insensitive): JPEG and PNG (whitout GD library) and all images supported by GD: GD, GD2, GD2PART, GIF, JPEG, PNG, BMP, XBM, XPM;. If not specified, the type is inferred from the file extension.
 * @method ImageOp setLink(mixed $link) URL or identifier returned by AddLink().
 * @method ImageOp setAlign(string $align) Indicates the alignment of the pointer next to image insertion relative to image height. The value can be:<ul><li>T: top-right for LTR or top-left for RTL</li><li>M: middle-right for LTR or middle-left for RTL</li><li>B: bottom-right for LTR or bottom-left for RTL</li><li>N: next line</li></ul>
 * @method ImageOp setResize(mixed $resize) If true resize (reduce) the image to fit $w and $h (requires GD or ImageMagick library); if false do not resize; if 2 force resize in all cases (upscaling and downscaling).
 * @method ImageOp setDpi(int $dpi) dot-per-inch resolution used on resize
 * @method ImageOp setPalign(string $palign) Allows to center or align the image on the current line. Possible values are:<ul><li>L : left align</li><li>C : center</li><li>R : right align</li><li>'' : empty string : left for LTR or right for RTL</li></ul>
 * @method ImageOp setIsmask(boolean $ismask) true if this image is a mask, false otherwise
 * @method ImageOp setImgmask(mixed $imgmask) image object returned by this function or false
 * @method ImageOp setBorder(mixed $border) Indicates if borders must be drawn around the cell. The value can be a number:<ul><li>0: no border (default)</li><li>1: frame</li></ul> or a string containing some or all of the following characters (in any order):<ul><li>L: left</li><li>T: top</li><li>R: right</li><li>B: bottom</li></ul> or an array of line styles for each border group - for example: array('LTRB' => array('width' => 2, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)))
 * @method ImageOp setFitbox(mixed $fitbox) If not false scale image dimensions proportionally to fit within the ($w, $h) box. $fitbox can be true or a 2 characters string indicating the image alignment inside the box. The first character indicate the horizontal alignment (L = left, C = center, R = right) the second character indicate the vertical algnment (T = top, M = middle, B = bottom).
 * @method ImageOp setHidden(boolean $hidden) If true do not display the image.
 * @method ImageOp setFitonpage(boolean $fitonpage) If true the image is resized to not exceed page dimensions.
 * @method ImageOp setAlt(boolean $alt) If true the image will be added as alternative and not directly printed (the ID of the image will be returned).
 * @method ImageOp setAltimgs(array $altimgs) Array of alternate images IDs. Each alternative image must be an array with two values: an integer representing the image ID (the value returned by the Image method) and a boolean value to indicate if the image is the default for printing.
 *
 * @method string getFile() Name of the file containing the image or a '@' character followed by the image data string. To link an image without embedding it on the document, set an asterisk character before the URL (i.e.: '*http://www.example.com/image.jpg').
 * @method float getX() Abscissa of the upper-left corner (LTR) or upper-right corner (RTL).
 * @method float getY() Ordinate of the upper-left corner (LTR) or upper-right corner (RTL).
 * @method float getW() Width of the image in the page. If not specified or equal to zero, it is automatically calculated.
 * @method float getH() Height of the image in the page. If not specified or equal to zero, it is automatically calculated.
 * @method string getType() Image format. Possible values are (case insensitive): JPEG and PNG (whitout GD library) and all images supported by GD: GD, GD2, GD2PART, GIF, JPEG, PNG, BMP, XBM, XPM;. If not specified, the type is inferred from the file extension.
 * @method mixed getLink() URL or identifier returned by AddLink().
 * @method string getAlign() Indicates the alignment of the pointer next to image insertion relative to image height. The value can be:<ul><li>T: top-right for LTR or top-left for RTL</li><li>M: middle-right for LTR or middle-left for RTL</li><li>B: bottom-right for LTR or bottom-left for RTL</li><li>N: next line</li></ul>
 * @method mixed getResize() If true resize (reduce) the image to fit $w and $h (requires GD or ImageMagick library); if false do not resize; if 2 force resize in all cases (upscaling and downscaling).
 * @method int getDpi() dot-per-inch resolution used on resize
 * @method string getPalign() Allows to center or align the image on the current line. Possible values are:<ul><li>L : left align</li><li>C : center</li><li>R : right align</li><li>'' : empty string : left for LTR or right for RTL</li></ul>
 * @method boolean getIsmask() true if this image is a mask, false otherwise
 * @method mixed getImgmask() image object returned by this function or false
 * @method mixed getBorder() Indicates if borders must be drawn around the cell. The value can be a number:<ul><li>0: no border (default)</li><li>1: frame</li></ul> or a string containing some or all of the following characters (in any order):<ul><li>L: left</li><li>T: top</li><li>R: right</li><li>B: bottom</li></ul> or an array of line styles for each border group - for example: array('LTRB' => array('width' => 2, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)))
 * @method mixed getFitbox() If not false scale image dimensions proportionally to fit within the ($w, $h) box. $fitbox can be true or a 2 characters string indicating the image alignment inside the box. The first character indicate the horizontal alignment (L = left, C = center, R = right) the second character indicate the vertical algnment (T = top, M = middle, B = bottom).
 * @method boolean getHidden() If true do not display the image.
 * @method boolean getFitonpage() If true the image is resized to not exceed page dimensions.
 * @method boolean getAlt() If true the image will be added as alternative and not directly printed (the ID of the image will be returned).
 * @method array getAltimgs() Array of alternate images IDs. Each alternative image must be an array with two values: an integer representing the image ID (the value returned by the Image method) and a boolean value to indicate if the image is the default for printing.
 *
 * @method image write() information
	 *
 * @method image render() information
	 *
 */
class ImageOp extends AbstractOp {

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
	}

	/**
	 * @var string
	 */
	protected function getMethod() {
		return 'Image';
	}

	/**
	 * @return image information
	 *
	 */
	public function put() {
		$this->assertArgExists('file');
		return parent::put();
	}

	/**
	 * Sets position.
	 * @param float $x Abscissa of the upper-left corner (LTR) or upper-right corner (RTL).
	 * @param float $y Ordinate of the upper-left corner (LTR) or upper-right corner (RTL).
	 * @return ImageOp
	 */
	public function setXY($x, $y) {
		return $this->setX($x)->setY($y);
	}

	/**
	 * Sets position.
	 * @param float $x Abscissa of the upper-left corner (LTR) or upper-right corner (RTL).
	 * @param float $y Ordinate of the upper-left corner (LTR) or upper-right corner (RTL).
	 * @return ImageOp
	 */
	public function setPos($x, $y) {
		return $this->setX($x)->setY($y);
	}

	/**
	 * Sets size.
	 * @param float $w Width of the image in the page. If not specified or equal to zero, it is automatically calculated.
	 * @param float $h Height of the image in the page. If not specified or equal to zero, it is automatically calculated.
	 * @return ImageOp
	 */
	public function setWH($w, $h) {
		return $this->setW($w)->setH($h);
	}

	/**
	 * Sets size.
	 * @param float $w Width of the image in the page. If not specified or equal to zero, it is automatically calculated.
	 * @param float $h Height of the image in the page. If not specified or equal to zero, it is automatically calculated.
	 * @return ImageOp
	 */
	public function setSize($w, $h) {
		return $this->setW($w)->setH($h);
	}

}
