<?php
/**
 * Created by Generator.
 * Package: org\majkel\tcpdfwarper
 * User: MichaÅ‚ (majkel) Kowalik <maf.michal@gmail.com>
 * Date: 2015-11-11
 * Time: 23:12:43
 */

namespace org\majkel\tcpdfwarper;

/**
 * Class Barcode2dOp
 * @package org\majkel\tcpdfwarper
 *
 * Print 2D Barcode.
 *
 * @property string $code code to print
 * @property string $type type of barcode (see tcpdf_barcodes_2d.php for supported formats). <ul> <li>DATAMATRIX : Datamatrix (ISO/IEC 16022)</li> <li>PDF417 : PDF417 (ISO/IEC 15438:2006)</li> <li>PDF417,a,e,t,s,f,o0,o1,o2,o3,o4,o5,o6 : PDF417 with parameters: a = aspect ratio (width/height); e = error correction level (0-8); t = total number of macro segments; s = macro segment index (0-99998); f = file ID; o0 = File Name (text); o1 = Segment Count (numeric); o2 = Time Stamp (numeric); o3 = Sender (text); o4 = Addressee (text); o5 = File Size (numeric); o6 = Checksum (numeric). NOTES: Parameters t, s and f are required for a Macro Control Block, all other parametrs are optional. To use a comma character ',' on text options, replace it with the character 255: "ÿ".</li> <li>QRCODE : QRcode Low error correction</li> <li>QRCODE,L : QRcode Low error correction</li> <li>QRCODE,M : QRcode Medium error correction</li> <li>QRCODE,Q : QRcode Better error correction</li> <li>QRCODE,H : QR-CODE Best error correction</li> <li>RAW: raw mode - comma-separad list of array rows</li> <li>RAW2: raw mode - array rows are surrounded by square parenthesis.</li> <li>TEST : Test matrix</li> </ul>
 * @property int $x x position in user units
 * @property int $y y position in user units
 * @property int $w width in user units
 * @property int $h height in user units
 * @property array $style array of options:<ul> <li>boolean $style['border'] if true prints a border around the barcode</li> <li>int $style['padding'] padding to leave around the barcode in barcode units (set to 'auto' for automatic padding)</li> <li>int $style['hpadding'] horizontal padding in barcode units (set to 'auto' for automatic padding)</li> <li>int $style['vpadding'] vertical padding in barcode units (set to 'auto' for automatic padding)</li> <li>int $style['module_width'] width of a single module in points</li> <li>int $style['module_height'] height of a single module in points</li> <li>array $style['fgcolor'] color array for bars and text</li> <li>mixed $style['bgcolor'] color array for background or false for transparent</li> <li>string $style['position'] barcode position on the page: L = left margin; C = center; R = right margin; S = stretch</li><li>$style['module_width'] width of a single module in points</li> <li>$style['module_height'] height of a single module in points</li></ul>
 * @property string $align Indicates the alignment of the pointer next to barcode insertion relative to barcode height. The value can be:<ul><li>T: top-right for LTR or top-left for RTL</li><li>M: middle-right for LTR or middle-left for RTL</li><li>B: bottom-right for LTR or bottom-left for RTL</li><li>N: next line</li></ul>
 * @property boolean $distort if true distort the barcode to fit width and height, otherwise preserve aspect ratio
 *
 * @method Barcode2dOp setCode(string $code) code to print
 * @method Barcode2dOp setType(string $type) type of barcode (see tcpdf_barcodes_2d.php for supported formats). <ul> <li>DATAMATRIX : Datamatrix (ISO/IEC 16022)</li> <li>PDF417 : PDF417 (ISO/IEC 15438:2006)</li> <li>PDF417,a,e,t,s,f,o0,o1,o2,o3,o4,o5,o6 : PDF417 with parameters: a = aspect ratio (width/height); e = error correction level (0-8); t = total number of macro segments; s = macro segment index (0-99998); f = file ID; o0 = File Name (text); o1 = Segment Count (numeric); o2 = Time Stamp (numeric); o3 = Sender (text); o4 = Addressee (text); o5 = File Size (numeric); o6 = Checksum (numeric). NOTES: Parameters t, s and f are required for a Macro Control Block, all other parametrs are optional. To use a comma character ',' on text options, replace it with the character 255: "ÿ".</li> <li>QRCODE : QRcode Low error correction</li> <li>QRCODE,L : QRcode Low error correction</li> <li>QRCODE,M : QRcode Medium error correction</li> <li>QRCODE,Q : QRcode Better error correction</li> <li>QRCODE,H : QR-CODE Best error correction</li> <li>RAW: raw mode - comma-separad list of array rows</li> <li>RAW2: raw mode - array rows are surrounded by square parenthesis.</li> <li>TEST : Test matrix</li> </ul>
 * @method Barcode2dOp setX(int $x) x position in user units
 * @method Barcode2dOp setY(int $y) y position in user units
 * @method Barcode2dOp setW(int $w) width in user units
 * @method Barcode2dOp setH(int $h) height in user units
 * @method Barcode2dOp setStyle(array $style) array of options:<ul> <li>boolean $style['border'] if true prints a border around the barcode</li> <li>int $style['padding'] padding to leave around the barcode in barcode units (set to 'auto' for automatic padding)</li> <li>int $style['hpadding'] horizontal padding in barcode units (set to 'auto' for automatic padding)</li> <li>int $style['vpadding'] vertical padding in barcode units (set to 'auto' for automatic padding)</li> <li>int $style['module_width'] width of a single module in points</li> <li>int $style['module_height'] height of a single module in points</li> <li>array $style['fgcolor'] color array for bars and text</li> <li>mixed $style['bgcolor'] color array for background or false for transparent</li> <li>string $style['position'] barcode position on the page: L = left margin; C = center; R = right margin; S = stretch</li><li>$style['module_width'] width of a single module in points</li> <li>$style['module_height'] height of a single module in points</li></ul>
 * @method Barcode2dOp setAlign(string $align) Indicates the alignment of the pointer next to barcode insertion relative to barcode height. The value can be:<ul><li>T: top-right for LTR or top-left for RTL</li><li>M: middle-right for LTR or middle-left for RTL</li><li>B: bottom-right for LTR or bottom-left for RTL</li><li>N: next line</li></ul>
 * @method Barcode2dOp setDistort(boolean $distort) if true distort the barcode to fit width and height, otherwise preserve aspect ratio
 *
 * @method string getCode() code to print
 * @method string getType() type of barcode (see tcpdf_barcodes_2d.php for supported formats). <ul> <li>DATAMATRIX : Datamatrix (ISO/IEC 16022)</li> <li>PDF417 : PDF417 (ISO/IEC 15438:2006)</li> <li>PDF417,a,e,t,s,f,o0,o1,o2,o3,o4,o5,o6 : PDF417 with parameters: a = aspect ratio (width/height); e = error correction level (0-8); t = total number of macro segments; s = macro segment index (0-99998); f = file ID; o0 = File Name (text); o1 = Segment Count (numeric); o2 = Time Stamp (numeric); o3 = Sender (text); o4 = Addressee (text); o5 = File Size (numeric); o6 = Checksum (numeric). NOTES: Parameters t, s and f are required for a Macro Control Block, all other parametrs are optional. To use a comma character ',' on text options, replace it with the character 255: "ÿ".</li> <li>QRCODE : QRcode Low error correction</li> <li>QRCODE,L : QRcode Low error correction</li> <li>QRCODE,M : QRcode Medium error correction</li> <li>QRCODE,Q : QRcode Better error correction</li> <li>QRCODE,H : QR-CODE Best error correction</li> <li>RAW: raw mode - comma-separad list of array rows</li> <li>RAW2: raw mode - array rows are surrounded by square parenthesis.</li> <li>TEST : Test matrix</li> </ul>
 * @method int getX() x position in user units
 * @method int getY() y position in user units
 * @method int getW() width in user units
 * @method int getH() height in user units
 * @method array getStyle() array of options:<ul> <li>boolean $style['border'] if true prints a border around the barcode</li> <li>int $style['padding'] padding to leave around the barcode in barcode units (set to 'auto' for automatic padding)</li> <li>int $style['hpadding'] horizontal padding in barcode units (set to 'auto' for automatic padding)</li> <li>int $style['vpadding'] vertical padding in barcode units (set to 'auto' for automatic padding)</li> <li>int $style['module_width'] width of a single module in points</li> <li>int $style['module_height'] height of a single module in points</li> <li>array $style['fgcolor'] color array for bars and text</li> <li>mixed $style['bgcolor'] color array for background or false for transparent</li> <li>string $style['position'] barcode position on the page: L = left margin; C = center; R = right margin; S = stretch</li><li>$style['module_width'] width of a single module in points</li> <li>$style['module_height'] height of a single module in points</li></ul>
 * @method string getAlign() Indicates the alignment of the pointer next to barcode insertion relative to barcode height. The value can be:<ul><li>T: top-right for LTR or top-left for RTL</li><li>M: middle-right for LTR or middle-left for RTL</li><li>B: bottom-right for LTR or bottom-left for RTL</li><li>N: next line</li></ul>
 * @method boolean getDistort() if true distort the barcode to fit width and height, otherwise preserve aspect ratio
 *
 * @method void write()
 * @method void render()
 */
class Barcode2dOp extends AbstractOp {

	/**
	 * @return array
	 */
	protected function getDefaultArguments() {
		return array(
			'code' => null,
			'type' => null,
			'x' => '',
			'y' => '',
			'w' => '',
			'h' => '',
			'style' => '',
			'align' => '',
			'distort' => false,
		);
	}

	/**
	 * @var string
	 */
	protected function getMethod() {
		return 'write2DBarcode';
	}

	/**
	 * @return void
	 */
	public function put() {
		$this->assertArgExists('code');
		$this->assertArgExists('type');
		parent::put();
	}

	/**
	 * Sets position.
	 * @param int $x x position in user units
	 * @param int $y y position in user units
	 * @return Barcode2dOp
	 */
	public function setXY($x, $y) {
		return $this->setX($x)->setY($y);
	}

	/**
	 * Sets position.
	 * @param int $x x position in user units
	 * @param int $y y position in user units
	 * @return Barcode2dOp
	 */
	public function setPos($x, $y) {
		return $this->setX($x)->setY($y);
	}

	/**
	 * Sets size.
	 * @param int $w width in user units
	 * @param int $h height in user units
	 * @return Barcode2dOp
	 */
	public function setWH($w, $h) {
		return $this->setW($w)->setH($h);
	}

	/**
	 * Sets size.
	 * @param int $w width in user units
	 * @param int $h height in user units
	 * @return Barcode2dOp
	 */
	public function setSize($w, $h) {
		return $this->setW($w)->setH($h);
	}

}
