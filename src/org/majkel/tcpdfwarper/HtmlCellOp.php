<?php
/**
 * Created by Generator.
 * Package: org\majkel\tcpdfwarper
 * User: Michał (majkel) Kowalik <maf.michal@gmail.com>
 * Date: 2016-01-26
 * Time: 23:13:35
 */

namespace org\majkel\tcpdfwarper;

/**
 * Class HtmlCellOp
 * @package org\majkel\tcpdfwarper
 *
 * Prints a cell (rectangular area) with optional borders, background color and html text string.
 * The upper-left corner of the cell corresponds to the current position. After the call, the current position moves to the right or to the next line.<br />
 * If automatic page breaking is enabled and the cell goes beyond the limit, a page break is done before outputting.
 * IMPORTANT: The HTML must be well formatted - try to clean-up it using an application like HTML-Tidy before submitting.
 * Supported tags are: a, b, blockquote, br, dd, del, div, dl, dt, em, font, h1, h2, h3, h4, h5, h6, hr, i, img, li, ol, p, pre, small, span, strong, sub, sup, table, tcpdf, td, th, thead, tr, tt, u, ul
 * NOTE: all the HTML attributes must be enclosed in double-quote.
 *
 * @property float $w Cell width. If 0, the cell extends up to the right margin.
 * @property float $h Cell minimum height. The cell extends automatically if needed.
 * @property float $x upper-left corner X coordinate
 * @property float $y upper-left corner Y coordinate
 * @property string $html html text to print. Default value: empty string.
 * @property mixed $border Indicates if borders must be drawn around the cell. The value can be a number:<ul><li>0: no border (default)</li><li>1: frame</li></ul> or a string containing some or all of the following characters (in any order):<ul><li>L: left</li><li>T: top</li><li>R: right</li><li>B: bottom</li></ul> or an array of line styles for each border group - for example: array('LTRB' => array('width' => 2, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)))
 * @property int $ln Indicates where the current position should go after the call. Possible values are:<ul><li>0: to the right (or left for RTL language)</li><li>1: to the beginning of the next line</li><li>2: below</li></ul> Putting 1 is equivalent to putting 0 and calling Ln() just after. Default value: 0.
 * @property boolean $fill Indicates if the cell background must be painted (true) or transparent (false).
 * @property boolean $reseth if true reset the last cell height (default true).
 * @property string $align Allows to center or align the text. Possible values are:<ul><li>L : left align</li><li>C : center</li><li>R : right align</li><li>'' : empty string : left for LTR or right for RTL</li></ul>
 * @property boolean $autopadding if true, uses internal padding and automatically adjust it to account for line width.
 *
 * @method HtmlCellOp setW(float $w) Cell width. If 0, the cell extends up to the right margin.
 * @method HtmlCellOp setH(float $h) Cell minimum height. The cell extends automatically if needed.
 * @method HtmlCellOp setX(float $x) upper-left corner X coordinate
 * @method HtmlCellOp setY(float $y) upper-left corner Y coordinate
 * @method HtmlCellOp setHtml(string $html) html text to print. Default value: empty string.
 * @method HtmlCellOp setBorder(mixed $border) Indicates if borders must be drawn around the cell. The value can be a number:<ul><li>0: no border (default)</li><li>1: frame</li></ul> or a string containing some or all of the following characters (in any order):<ul><li>L: left</li><li>T: top</li><li>R: right</li><li>B: bottom</li></ul> or an array of line styles for each border group - for example: array('LTRB' => array('width' => 2, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)))
 * @method HtmlCellOp setLn(int $ln) Indicates where the current position should go after the call. Possible values are:<ul><li>0: to the right (or left for RTL language)</li><li>1: to the beginning of the next line</li><li>2: below</li></ul> Putting 1 is equivalent to putting 0 and calling Ln() just after. Default value: 0.
 * @method HtmlCellOp setFill(boolean $fill) Indicates if the cell background must be painted (true) or transparent (false).
 * @method HtmlCellOp setReseth(boolean $reseth) if true reset the last cell height (default true).
 * @method HtmlCellOp setAlign(string $align) Allows to center or align the text. Possible values are:<ul><li>L : left align</li><li>C : center</li><li>R : right align</li><li>'' : empty string : left for LTR or right for RTL</li></ul>
 * @method HtmlCellOp setAutopadding(boolean $autopadding) if true, uses internal padding and automatically adjust it to account for line width.
 *
 * @method float getW() Cell width. If 0, the cell extends up to the right margin.
 * @method float getH() Cell minimum height. The cell extends automatically if needed.
 * @method float getX() upper-left corner X coordinate
 * @method float getY() upper-left corner Y coordinate
 * @method string getHtml() html text to print. Default value: empty string.
 * @method mixed getBorder() Indicates if borders must be drawn around the cell. The value can be a number:<ul><li>0: no border (default)</li><li>1: frame</li></ul> or a string containing some or all of the following characters (in any order):<ul><li>L: left</li><li>T: top</li><li>R: right</li><li>B: bottom</li></ul> or an array of line styles for each border group - for example: array('LTRB' => array('width' => 2, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)))
 * @method int getLn() Indicates where the current position should go after the call. Possible values are:<ul><li>0: to the right (or left for RTL language)</li><li>1: to the beginning of the next line</li><li>2: below</li></ul> Putting 1 is equivalent to putting 0 and calling Ln() just after. Default value: 0.
 * @method boolean getFill() Indicates if the cell background must be painted (true) or transparent (false).
 * @method boolean getReseth() if true reset the last cell height (default true).
 * @method string getAlign() Allows to center or align the text. Possible values are:<ul><li>L : left align</li><li>C : center</li><li>R : right align</li><li>'' : empty string : left for LTR or right for RTL</li></ul>
 * @method boolean getAutopadding() if true, uses internal padding and automatically adjust it to account for line width.
 *
 * @method void write()
 * @method void render()
 */
class HtmlCellOp extends AbstractOp {

	/**
	 * @codeCoverageIgnore
	 * @return array
	 */
	protected function getDefaultArguments() {
		return array(
			'w' => null,
			'h' => null,
			'x' => null,
			'y' => null,
			'html' => '',
			'border' => 0,
			'ln' => 0,
			'fill' => false,
			'reseth' => true,
			'align' => '',
			'autopadding' => true,
		);
	}

	/**
	 * @codeCoverageIgnore
	 * @return string
	 */
	protected function getMethod() {
		return 'writeHTMLCell';
	}

	/**
	 * @return void
	 */
	public function put() {
		$this->assertArgExists('w');
		$this->assertArgExists('h');
		$this->assertArgExists('x');
		$this->assertArgExists('y');
		parent::put();
	}

	/**
	 * Sets position.
	 * @param float $x upper-left corner X coordinate
	 * @param float $y upper-left corner Y coordinate
	 * @return HtmlCellOp
	 */
	public function setXY($x, $y) {
		return $this->setX($x)->setY($y);
	}

	/**
	 * Sets position.
	 * @param float $x upper-left corner X coordinate
	 * @param float $y upper-left corner Y coordinate
	 * @return HtmlCellOp
	 */
	public function setPos($x, $y) {
		return $this->setX($x)->setY($y);
	}

	/**
	 * Sets size.
	 * @param float $w Cell width. If 0, the cell extends up to the right margin.
	 * @param float $h Cell minimum height. The cell extends automatically if needed.
	 * @return HtmlCellOp
	 */
	public function setWH($w, $h) {
		return $this->setW($w)->setH($h);
	}

	/**
	 * Sets size.
	 * @param float $w Cell width. If 0, the cell extends up to the right margin.
	 * @param float $h Cell minimum height. The cell extends automatically if needed.
	 * @return HtmlCellOp
	 */
	public function setSize($w, $h) {
		return $this->setW($w)->setH($h);
	}

}
