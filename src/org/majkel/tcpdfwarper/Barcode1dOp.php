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
 * Class Barcode1dOp
 * @package org\majkel\tcpdfwarper
 *
 * Print a Linear Barcode.
 *
 * @property string $code code to print
 * @property string $type type of barcode (see tcpdf_barcodes_1d.php for supported formats). <ul> <li>C39 : CODE 39 - ANSI MH10.8M-1983 - USD-3 - 3 of 9.</li> <li>C39+ : CODE 39 with checksum</li> <li>C39E : CODE 39 EXTENDED</li> <li>C39E+ : CODE 39 EXTENDED + CHECKSUM</li> <li>C93 : CODE 93 - USS-93</li> <li>S25 : Standard 2 of 5</li> <li>S25+ : Standard 2 of 5 + CHECKSUM</li> <li>I25 : Interleaved 2 of 5</li> <li>I25+ : Interleaved 2 of 5 + CHECKSUM</li> <li>C128 : CODE 128</li> <li>C128A : CODE 128 A</li> <li>C128B : CODE 128 B</li> <li>C128C : CODE 128 C</li> <li>EAN2 : 2-Digits UPC-Based Extension</li> <li>EAN5 : 5-Digits UPC-Based Extension</li> <li>EAN8 : EAN 8</li> <li>EAN13 : EAN 13</li> <li>UPCA : UPC-A</li> <li>UPCE : UPC-E</li> <li>MSI : MSI (Variation of Plessey code)</li> <li>MSI+ : MSI + CHECKSUM (modulo 11)</li> <li>POSTNET : POSTNET</li> <li>PLANET : PLANET</li> <li>RMS4CC : RMS4CC (Royal Mail 4-state Customer Code) - CBC (Customer Bar Code)</li> <li>KIX : KIX (Klant index - Customer index)</li> <li>IMB: Intelligent Mail Barcode - Onecode - USPS-B-3200</li> <li>CODABAR : CODABAR</li> <li>CODE11 : CODE 11</li> <li>PHARMA : PHARMACODE</li> <li>PHARMA2T : PHARMACODE TWO-TRACKS</li> </ul>
 * @property int $x x position in user units (empty string = current x position)
 * @property int $y y position in user units (empty string = current y position)
 * @property int $w width in user units (empty string = remaining page width)
 * @property int $h height in user units (empty string = remaining page height)
 * @property float $xres width of the smallest bar in user units (empty string = default value = 0.4mm)
 * @property array $style array of options:<ul> <li>boolean $style['border'] if true prints a border</li> <li>int $style['padding'] padding to leave around the barcode in user units (set to 'auto' for automatic padding)</li> <li>int $style['hpadding'] horizontal padding in user units (set to 'auto' for automatic padding)</li> <li>int $style['vpadding'] vertical padding in user units (set to 'auto' for automatic padding)</li> <li>array $style['fgcolor'] color array for bars and text</li> <li>mixed $style['bgcolor'] color array for background (set to false for transparent)</li> <li>boolean $style['text'] if true prints text below the barcode</li> <li>string $style['label'] override default label</li> <li>string $style['font'] font name for text</li><li>int $style['fontsize'] font size for text</li> <li>int $style['stretchtext']: 0 = disabled; 1 = horizontal scaling only if necessary; 2 = forced horizontal scaling; 3 = character spacing only if necessary; 4 = forced character spacing.</li> <li>string $style['position'] horizontal position of the containing barcode cell on the page: L = left margin; C = center; R = right margin.</li> <li>string $style['align'] horizontal position of the barcode on the containing rectangle: L = left; C = center; R = right.</li> <li>string $style['stretch'] if true stretch the barcode to best fit the available width, otherwise uses $xres resolution for a single bar.</li> <li>string $style['fitwidth'] if true reduce the width to fit the barcode width + padding. When this option is enabled the 'stretch' option is automatically disabled.</li> <li>string $style['cellfitalign'] this option works only when 'fitwidth' is true and 'position' is unset or empty. Set the horizontal position of the containing barcode cell inside the specified rectangle: L = left; C = center; R = right.</li></ul>
 * @property string $align Indicates the alignment of the pointer next to barcode insertion relative to barcode height. The value can be:<ul><li>T: top-right for LTR or top-left for RTL</li><li>M: middle-right for LTR or middle-left for RTL</li><li>B: bottom-right for LTR or bottom-left for RTL</li><li>N: next line</li></ul>
 *
 * @method Barcode1dOp setCode(string $code) code to print
 * @method Barcode1dOp setType(string $type) type of barcode (see tcpdf_barcodes_1d.php for supported formats). <ul> <li>C39 : CODE 39 - ANSI MH10.8M-1983 - USD-3 - 3 of 9.</li> <li>C39+ : CODE 39 with checksum</li> <li>C39E : CODE 39 EXTENDED</li> <li>C39E+ : CODE 39 EXTENDED + CHECKSUM</li> <li>C93 : CODE 93 - USS-93</li> <li>S25 : Standard 2 of 5</li> <li>S25+ : Standard 2 of 5 + CHECKSUM</li> <li>I25 : Interleaved 2 of 5</li> <li>I25+ : Interleaved 2 of 5 + CHECKSUM</li> <li>C128 : CODE 128</li> <li>C128A : CODE 128 A</li> <li>C128B : CODE 128 B</li> <li>C128C : CODE 128 C</li> <li>EAN2 : 2-Digits UPC-Based Extension</li> <li>EAN5 : 5-Digits UPC-Based Extension</li> <li>EAN8 : EAN 8</li> <li>EAN13 : EAN 13</li> <li>UPCA : UPC-A</li> <li>UPCE : UPC-E</li> <li>MSI : MSI (Variation of Plessey code)</li> <li>MSI+ : MSI + CHECKSUM (modulo 11)</li> <li>POSTNET : POSTNET</li> <li>PLANET : PLANET</li> <li>RMS4CC : RMS4CC (Royal Mail 4-state Customer Code) - CBC (Customer Bar Code)</li> <li>KIX : KIX (Klant index - Customer index)</li> <li>IMB: Intelligent Mail Barcode - Onecode - USPS-B-3200</li> <li>CODABAR : CODABAR</li> <li>CODE11 : CODE 11</li> <li>PHARMA : PHARMACODE</li> <li>PHARMA2T : PHARMACODE TWO-TRACKS</li> </ul>
 * @method Barcode1dOp setX(int $x) x position in user units (empty string = current x position)
 * @method Barcode1dOp setY(int $y) y position in user units (empty string = current y position)
 * @method Barcode1dOp setW(int $w) width in user units (empty string = remaining page width)
 * @method Barcode1dOp setH(int $h) height in user units (empty string = remaining page height)
 * @method Barcode1dOp setXres(float $xres) width of the smallest bar in user units (empty string = default value = 0.4mm)
 * @method Barcode1dOp setStyle(array $style) array of options:<ul> <li>boolean $style['border'] if true prints a border</li> <li>int $style['padding'] padding to leave around the barcode in user units (set to 'auto' for automatic padding)</li> <li>int $style['hpadding'] horizontal padding in user units (set to 'auto' for automatic padding)</li> <li>int $style['vpadding'] vertical padding in user units (set to 'auto' for automatic padding)</li> <li>array $style['fgcolor'] color array for bars and text</li> <li>mixed $style['bgcolor'] color array for background (set to false for transparent)</li> <li>boolean $style['text'] if true prints text below the barcode</li> <li>string $style['label'] override default label</li> <li>string $style['font'] font name for text</li><li>int $style['fontsize'] font size for text</li> <li>int $style['stretchtext']: 0 = disabled; 1 = horizontal scaling only if necessary; 2 = forced horizontal scaling; 3 = character spacing only if necessary; 4 = forced character spacing.</li> <li>string $style['position'] horizontal position of the containing barcode cell on the page: L = left margin; C = center; R = right margin.</li> <li>string $style['align'] horizontal position of the barcode on the containing rectangle: L = left; C = center; R = right.</li> <li>string $style['stretch'] if true stretch the barcode to best fit the available width, otherwise uses $xres resolution for a single bar.</li> <li>string $style['fitwidth'] if true reduce the width to fit the barcode width + padding. When this option is enabled the 'stretch' option is automatically disabled.</li> <li>string $style['cellfitalign'] this option works only when 'fitwidth' is true and 'position' is unset or empty. Set the horizontal position of the containing barcode cell inside the specified rectangle: L = left; C = center; R = right.</li></ul>
 * @method Barcode1dOp setAlign(string $align) Indicates the alignment of the pointer next to barcode insertion relative to barcode height. The value can be:<ul><li>T: top-right for LTR or top-left for RTL</li><li>M: middle-right for LTR or middle-left for RTL</li><li>B: bottom-right for LTR or bottom-left for RTL</li><li>N: next line</li></ul>
 *
 * @method string getCode() code to print
 * @method string getType() type of barcode (see tcpdf_barcodes_1d.php for supported formats). <ul> <li>C39 : CODE 39 - ANSI MH10.8M-1983 - USD-3 - 3 of 9.</li> <li>C39+ : CODE 39 with checksum</li> <li>C39E : CODE 39 EXTENDED</li> <li>C39E+ : CODE 39 EXTENDED + CHECKSUM</li> <li>C93 : CODE 93 - USS-93</li> <li>S25 : Standard 2 of 5</li> <li>S25+ : Standard 2 of 5 + CHECKSUM</li> <li>I25 : Interleaved 2 of 5</li> <li>I25+ : Interleaved 2 of 5 + CHECKSUM</li> <li>C128 : CODE 128</li> <li>C128A : CODE 128 A</li> <li>C128B : CODE 128 B</li> <li>C128C : CODE 128 C</li> <li>EAN2 : 2-Digits UPC-Based Extension</li> <li>EAN5 : 5-Digits UPC-Based Extension</li> <li>EAN8 : EAN 8</li> <li>EAN13 : EAN 13</li> <li>UPCA : UPC-A</li> <li>UPCE : UPC-E</li> <li>MSI : MSI (Variation of Plessey code)</li> <li>MSI+ : MSI + CHECKSUM (modulo 11)</li> <li>POSTNET : POSTNET</li> <li>PLANET : PLANET</li> <li>RMS4CC : RMS4CC (Royal Mail 4-state Customer Code) - CBC (Customer Bar Code)</li> <li>KIX : KIX (Klant index - Customer index)</li> <li>IMB: Intelligent Mail Barcode - Onecode - USPS-B-3200</li> <li>CODABAR : CODABAR</li> <li>CODE11 : CODE 11</li> <li>PHARMA : PHARMACODE</li> <li>PHARMA2T : PHARMACODE TWO-TRACKS</li> </ul>
 * @method int getX() x position in user units (empty string = current x position)
 * @method int getY() y position in user units (empty string = current y position)
 * @method int getW() width in user units (empty string = remaining page width)
 * @method int getH() height in user units (empty string = remaining page height)
 * @method float getXres() width of the smallest bar in user units (empty string = default value = 0.4mm)
 * @method array getStyle() array of options:<ul> <li>boolean $style['border'] if true prints a border</li> <li>int $style['padding'] padding to leave around the barcode in user units (set to 'auto' for automatic padding)</li> <li>int $style['hpadding'] horizontal padding in user units (set to 'auto' for automatic padding)</li> <li>int $style['vpadding'] vertical padding in user units (set to 'auto' for automatic padding)</li> <li>array $style['fgcolor'] color array for bars and text</li> <li>mixed $style['bgcolor'] color array for background (set to false for transparent)</li> <li>boolean $style['text'] if true prints text below the barcode</li> <li>string $style['label'] override default label</li> <li>string $style['font'] font name for text</li><li>int $style['fontsize'] font size for text</li> <li>int $style['stretchtext']: 0 = disabled; 1 = horizontal scaling only if necessary; 2 = forced horizontal scaling; 3 = character spacing only if necessary; 4 = forced character spacing.</li> <li>string $style['position'] horizontal position of the containing barcode cell on the page: L = left margin; C = center; R = right margin.</li> <li>string $style['align'] horizontal position of the barcode on the containing rectangle: L = left; C = center; R = right.</li> <li>string $style['stretch'] if true stretch the barcode to best fit the available width, otherwise uses $xres resolution for a single bar.</li> <li>string $style['fitwidth'] if true reduce the width to fit the barcode width + padding. When this option is enabled the 'stretch' option is automatically disabled.</li> <li>string $style['cellfitalign'] this option works only when 'fitwidth' is true and 'position' is unset or empty. Set the horizontal position of the containing barcode cell inside the specified rectangle: L = left; C = center; R = right.</li></ul>
 * @method string getAlign() Indicates the alignment of the pointer next to barcode insertion relative to barcode height. The value can be:<ul><li>T: top-right for LTR or top-left for RTL</li><li>M: middle-right for LTR or middle-left for RTL</li><li>B: bottom-right for LTR or bottom-left for RTL</li><li>N: next line</li></ul>
 *
 * @method void write()
 * @method void render()
 */
class Barcode1dOp extends AbstractOp {

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
			'xres' => '',
			'style' => '',
			'align' => '',
		);
	}

	/**
	 * @return string
	 */
	protected function getMethod() {
		return 'write1DBarcode';
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
	 * @param int $x x position in user units (empty string = current x position)
	 * @param int $y y position in user units (empty string = current y position)
	 * @return Barcode1dOp
	 */
	public function setXY($x, $y) {
		return $this->setX($x)->setY($y);
	}

	/**
	 * Sets position.
	 * @param int $x x position in user units (empty string = current x position)
	 * @param int $y y position in user units (empty string = current y position)
	 * @return Barcode1dOp
	 */
	public function setPos($x, $y) {
		return $this->setX($x)->setY($y);
	}

	/**
	 * Sets size.
	 * @param int $w width in user units (empty string = remaining page width)
	 * @param int $h height in user units (empty string = remaining page height)
	 * @return Barcode1dOp
	 */
	public function setWH($w, $h) {
		return $this->setW($w)->setH($h);
	}

	/**
	 * Sets size.
	 * @param int $w width in user units (empty string = remaining page width)
	 * @param int $h height in user units (empty string = remaining page height)
	 * @return Barcode1dOp
	 */
	public function setSize($w, $h) {
		return $this->setW($w)->setH($h);
	}

}
