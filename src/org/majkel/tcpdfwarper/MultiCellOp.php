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
 * Class MultiCellOp
 * @package org\majkel\tcpdfwarper
 *
 * This method allows printing text with line breaks.
 * They can be automatic (as soon as the text reaches the right border of the cell) or explicit (via the \n character). As many cells as necessary are output, one below the other.<br />
 * Text can be aligned, centered or justified. The cell block can be framed and the background painted.
 *
 * @property float $w Width of cells. If 0, they extend up to the right margin of the page.
 * @property float $h Cell minimum height. The cell extends automatically if needed.
 * @property string $txt String to print
 * @property mixed $border Indicates if borders must be drawn around the cell. The value can be a number:<ul><li>0: no border (default)</li><li>1: frame</li></ul> or a string containing some or all of the following characters (in any order):<ul><li>L: left</li><li>T: top</li><li>R: right</li><li>B: bottom</li></ul> or an array of line styles for each border group - for example: array('LTRB' => array('width' => 2, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)))
 * @property string $align Allows to center or align the text. Possible values are:<ul><li>L or empty string: left align</li><li>C: center</li><li>R: right align</li><li>J: justification (default value when $ishtml=false)</li></ul>
 * @property boolean $fill Indicates if the cell background must be painted (true) or transparent (false).
 * @property int $ln Indicates where the current position should go after the call. Possible values are:<ul><li>0: to the right</li><li>1: to the beginning of the next line [DEFAULT]</li><li>2: below</li></ul>
 * @property float $x x position in user units
 * @property float $y y position in user units
 * @property boolean $reseth if true reset the last cell height (default true).
 * @property int $stretch font stretch mode: <ul><li>0 = disabled</li><li>1 = horizontal scaling only if text is larger than cell width</li><li>2 = forced horizontal scaling to fit cell width</li><li>3 = character spacing only if text is larger than cell width</li><li>4 = forced character spacing to fit cell width</li></ul> General font stretching and scaling values will be preserved when possible.
 * @property boolean $ishtml INTERNAL USE ONLY -- set to true if $txt is HTML content (default = false). Never set this parameter to true, use instead writeHTMLCell() or writeHTML() methods.
 * @property boolean $autopadding if true, uses internal padding and automatically adjust it to account for line width.
 * @property float $maxh maximum height. It should be >= $h and less then remaining space to the bottom of the page, or 0 for disable this feature. This feature works only when $ishtml=false.
 * @property string $valign Vertical alignment of text (requires $maxh = $h > 0). Possible values are:<ul><li>T: TOP</li><li>M: middle</li><li>B: bottom</li></ul>. This feature works only when $ishtml=false and the cell must fit in a single page.
 * @property boolean $fitcell if true attempt to fit all the text within the cell by reducing the font size (do not work in HTML mode). $maxh must be greater than 0 and equal to $h.
 *
 * @method MultiCellOp setW(float $w) Width of cells. If 0, they extend up to the right margin of the page.
 * @method MultiCellOp setH(float $h) Cell minimum height. The cell extends automatically if needed.
 * @method MultiCellOp setTxt(string $txt) String to print
 * @method MultiCellOp setBorder(mixed $border) Indicates if borders must be drawn around the cell. The value can be a number:<ul><li>0: no border (default)</li><li>1: frame</li></ul> or a string containing some or all of the following characters (in any order):<ul><li>L: left</li><li>T: top</li><li>R: right</li><li>B: bottom</li></ul> or an array of line styles for each border group - for example: array('LTRB' => array('width' => 2, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)))
 * @method MultiCellOp setAlign(string $align) Allows to center or align the text. Possible values are:<ul><li>L or empty string: left align</li><li>C: center</li><li>R: right align</li><li>J: justification (default value when $ishtml=false)</li></ul>
 * @method MultiCellOp setFill(boolean $fill) Indicates if the cell background must be painted (true) or transparent (false).
 * @method MultiCellOp setLn(int $ln) Indicates where the current position should go after the call. Possible values are:<ul><li>0: to the right</li><li>1: to the beginning of the next line [DEFAULT]</li><li>2: below</li></ul>
 * @method MultiCellOp setX(float $x) x position in user units
 * @method MultiCellOp setY(float $y) y position in user units
 * @method MultiCellOp setReseth(boolean $reseth) if true reset the last cell height (default true).
 * @method MultiCellOp setStretch(int $stretch) font stretch mode: <ul><li>0 = disabled</li><li>1 = horizontal scaling only if text is larger than cell width</li><li>2 = forced horizontal scaling to fit cell width</li><li>3 = character spacing only if text is larger than cell width</li><li>4 = forced character spacing to fit cell width</li></ul> General font stretching and scaling values will be preserved when possible.
 * @method MultiCellOp setIshtml(boolean $ishtml) INTERNAL USE ONLY -- set to true if $txt is HTML content (default = false). Never set this parameter to true, use instead writeHTMLCell() or writeHTML() methods.
 * @method MultiCellOp setAutopadding(boolean $autopadding) if true, uses internal padding and automatically adjust it to account for line width.
 * @method MultiCellOp setMaxh(float $maxh) maximum height. It should be >= $h and less then remaining space to the bottom of the page, or 0 for disable this feature. This feature works only when $ishtml=false.
 * @method MultiCellOp setValign(string $valign) Vertical alignment of text (requires $maxh = $h > 0). Possible values are:<ul><li>T: TOP</li><li>M: middle</li><li>B: bottom</li></ul>. This feature works only when $ishtml=false and the cell must fit in a single page.
 * @method MultiCellOp setFitcell(boolean $fitcell) if true attempt to fit all the text within the cell by reducing the font size (do not work in HTML mode). $maxh must be greater than 0 and equal to $h.
 *
 * @method float getW() Width of cells. If 0, they extend up to the right margin of the page.
 * @method float getH() Cell minimum height. The cell extends automatically if needed.
 * @method string getTxt() String to print
 * @method mixed getBorder() Indicates if borders must be drawn around the cell. The value can be a number:<ul><li>0: no border (default)</li><li>1: frame</li></ul> or a string containing some or all of the following characters (in any order):<ul><li>L: left</li><li>T: top</li><li>R: right</li><li>B: bottom</li></ul> or an array of line styles for each border group - for example: array('LTRB' => array('width' => 2, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)))
 * @method string getAlign() Allows to center or align the text. Possible values are:<ul><li>L or empty string: left align</li><li>C: center</li><li>R: right align</li><li>J: justification (default value when $ishtml=false)</li></ul>
 * @method boolean getFill() Indicates if the cell background must be painted (true) or transparent (false).
 * @method int getLn() Indicates where the current position should go after the call. Possible values are:<ul><li>0: to the right</li><li>1: to the beginning of the next line [DEFAULT]</li><li>2: below</li></ul>
 * @method float getX() x position in user units
 * @method float getY() y position in user units
 * @method boolean getReseth() if true reset the last cell height (default true).
 * @method int getStretch() font stretch mode: <ul><li>0 = disabled</li><li>1 = horizontal scaling only if text is larger than cell width</li><li>2 = forced horizontal scaling to fit cell width</li><li>3 = character spacing only if text is larger than cell width</li><li>4 = forced character spacing to fit cell width</li></ul> General font stretching and scaling values will be preserved when possible.
 * @method boolean getIshtml() INTERNAL USE ONLY -- set to true if $txt is HTML content (default = false). Never set this parameter to true, use instead writeHTMLCell() or writeHTML() methods.
 * @method boolean getAutopadding() if true, uses internal padding and automatically adjust it to account for line width.
 * @method float getMaxh() maximum height. It should be >= $h and less then remaining space to the bottom of the page, or 0 for disable this feature. This feature works only when $ishtml=false.
 * @method string getValign() Vertical alignment of text (requires $maxh = $h > 0). Possible values are:<ul><li>T: TOP</li><li>M: middle</li><li>B: bottom</li></ul>. This feature works only when $ishtml=false and the cell must fit in a single page.
 * @method boolean getFitcell() if true attempt to fit all the text within the cell by reducing the font size (do not work in HTML mode). $maxh must be greater than 0 and equal to $h.
 *
 * @method int write() Return the number of cells or 1 for html mode.
	 *
 * @method int render() Return the number of cells or 1 for html mode.
	 *
 */
class MultiCellOp extends AbstractOp {

	/**
	 * @codeCoverageIgnore
	 * @return array
	 */
	protected function getDefaultArguments() {
		return array(
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
	}

	/**
	 * @codeCoverageIgnore
	 * @return string
	 */
	protected function getMethod() {
		return 'MultiCell';
	}

	/**
	 * @return int Return the number of cells or 1 for html mode.
	 *
	 */
	public function put() {
		$this->assertArgExists('w');
		$this->assertArgExists('h');
		$this->assertArgExists('txt');
		return parent::put();
	}

	/**
	 * Sets position.
	 * @param float $x x position in user units
	 * @param float $y y position in user units
	 * @return MultiCellOp
	 */
	public function setXY($x, $y) {
		return $this->setX($x)->setY($y);
	}

	/**
	 * Sets position.
	 * @param float $x x position in user units
	 * @param float $y y position in user units
	 * @return MultiCellOp
	 */
	public function setPos($x, $y) {
		return $this->setX($x)->setY($y);
	}

	/**
	 * Sets size.
	 * @param float $w Width of cells. If 0, they extend up to the right margin of the page.
	 * @param float $h Cell minimum height. The cell extends automatically if needed.
	 * @return MultiCellOp
	 */
	public function setWH($w, $h) {
		return $this->setW($w)->setH($h);
	}

	/**
	 * Sets size.
	 * @param float $w Width of cells. If 0, they extend up to the right margin of the page.
	 * @param float $h Cell minimum height. The cell extends automatically if needed.
	 * @return MultiCellOp
	 */
	public function setSize($w, $h) {
		return $this->setW($w)->setH($h);
	}

}
