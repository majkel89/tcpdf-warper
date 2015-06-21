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
 * Class CellOp
 * @package org\majkel\tcpdfwarper
 *
 * Prints a cell (rectangular area) with optional borders, background color and character string. The upper-left corner of the cell corresponds to the current position. The text can be aligned or centered. After the call, the current position moves to the right or to the next line. It is possible to put a link on the text.<br />
 * If automatic page breaking is enabled and the cell goes beyond the limit, a page break is done before outputting.
 *
 * @property float $w Cell width. If 0, the cell extends up to the right margin.
 * @property float $h Cell height. Default value: 0.
 * @property string $txt String to print. Default value: empty string.
 * @property mixed $border Indicates if borders must be drawn around the cell. The value can be a number:<ul><li>0: no border (default)</li><li>1: frame</li></ul> or a string containing some or all of the following characters (in any order):<ul><li>L: left</li><li>T: top</li><li>R: right</li><li>B: bottom</li></ul> or an array of line styles for each border group - for example: array('LTRB' => array('width' => 2, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)))
 * @property int $ln Indicates where the current position should go after the call. Possible values are:<ul><li>0: to the right (or left for RTL languages)</li><li>1: to the beginning of the next line</li><li>2: below</li></ul> Putting 1 is equivalent to putting 0 and calling Ln() just after. Default value: 0.
 * @property string $align Allows to center or align the text. Possible values are:<ul><li>L or empty string: left align (default value)</li><li>C: center</li><li>R: right align</li><li>J: justify</li></ul>
 * @property boolean $fill Indicates if the cell background must be painted (true) or transparent (false).
 * @property mixed $link URL or identifier returned by AddLink().
 * @property int $stretch font stretch mode: <ul><li>0 = disabled</li><li>1 = horizontal scaling only if text is larger than cell width</li><li>2 = forced horizontal scaling to fit cell width</li><li>3 = character spacing only if text is larger than cell width</li><li>4 = forced character spacing to fit cell width</li></ul> General font stretching and scaling values will be preserved when possible.
 * @property boolean $ignoreMinHeight if true ignore automatic minimum height value.
 * @property string $calign cell vertical alignment relative to the specified Y value. Possible values are:<ul><li>T : cell top</li><li>C : center</li><li>B : cell bottom</li><li>A : font top</li><li>L : font baseline</li><li>D : font bottom</li></ul>
 * @property string $valign text vertical alignment inside the cell. Possible values are:<ul><li>T : top</li><li>C : center</li><li>B : bottom</li></ul>
 *
 * @method CellOp setW(float $w) Cell width. If 0, the cell extends up to the right margin.
 * @method CellOp setH(float $h) Cell height. Default value: 0.
 * @method CellOp setTxt(string $txt) String to print. Default value: empty string.
 * @method CellOp setBorder(mixed $border) Indicates if borders must be drawn around the cell. The value can be a number:<ul><li>0: no border (default)</li><li>1: frame</li></ul> or a string containing some or all of the following characters (in any order):<ul><li>L: left</li><li>T: top</li><li>R: right</li><li>B: bottom</li></ul> or an array of line styles for each border group - for example: array('LTRB' => array('width' => 2, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)))
 * @method CellOp setLn(int $ln) Indicates where the current position should go after the call. Possible values are:<ul><li>0: to the right (or left for RTL languages)</li><li>1: to the beginning of the next line</li><li>2: below</li></ul> Putting 1 is equivalent to putting 0 and calling Ln() just after. Default value: 0.
 * @method CellOp setAlign(string $align) Allows to center or align the text. Possible values are:<ul><li>L or empty string: left align (default value)</li><li>C: center</li><li>R: right align</li><li>J: justify</li></ul>
 * @method CellOp setFill(boolean $fill) Indicates if the cell background must be painted (true) or transparent (false).
 * @method CellOp setLink(mixed $link) URL or identifier returned by AddLink().
 * @method CellOp setStretch(int $stretch) font stretch mode: <ul><li>0 = disabled</li><li>1 = horizontal scaling only if text is larger than cell width</li><li>2 = forced horizontal scaling to fit cell width</li><li>3 = character spacing only if text is larger than cell width</li><li>4 = forced character spacing to fit cell width</li></ul> General font stretching and scaling values will be preserved when possible.
 * @method CellOp setIgnoreMinHeight(boolean $ignoreMinHeight) if true ignore automatic minimum height value.
 * @method CellOp setCalign(string $calign) cell vertical alignment relative to the specified Y value. Possible values are:<ul><li>T : cell top</li><li>C : center</li><li>B : cell bottom</li><li>A : font top</li><li>L : font baseline</li><li>D : font bottom</li></ul>
 * @method CellOp setValign(string $valign) text vertical alignment inside the cell. Possible values are:<ul><li>T : top</li><li>C : center</li><li>B : bottom</li></ul>
 *
 * @method float getW() Cell width. If 0, the cell extends up to the right margin.
 * @method float getH() Cell height. Default value: 0.
 * @method string getTxt() String to print. Default value: empty string.
 * @method mixed getBorder() Indicates if borders must be drawn around the cell. The value can be a number:<ul><li>0: no border (default)</li><li>1: frame</li></ul> or a string containing some or all of the following characters (in any order):<ul><li>L: left</li><li>T: top</li><li>R: right</li><li>B: bottom</li></ul> or an array of line styles for each border group - for example: array('LTRB' => array('width' => 2, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)))
 * @method int getLn() Indicates where the current position should go after the call. Possible values are:<ul><li>0: to the right (or left for RTL languages)</li><li>1: to the beginning of the next line</li><li>2: below</li></ul> Putting 1 is equivalent to putting 0 and calling Ln() just after. Default value: 0.
 * @method string getAlign() Allows to center or align the text. Possible values are:<ul><li>L or empty string: left align (default value)</li><li>C: center</li><li>R: right align</li><li>J: justify</li></ul>
 * @method boolean getFill() Indicates if the cell background must be painted (true) or transparent (false).
 * @method mixed getLink() URL or identifier returned by AddLink().
 * @method int getStretch() font stretch mode: <ul><li>0 = disabled</li><li>1 = horizontal scaling only if text is larger than cell width</li><li>2 = forced horizontal scaling to fit cell width</li><li>3 = character spacing only if text is larger than cell width</li><li>4 = forced character spacing to fit cell width</li></ul> General font stretching and scaling values will be preserved when possible.
 * @method boolean getIgnoreMinHeight() if true ignore automatic minimum height value.
 * @method string getCalign() cell vertical alignment relative to the specified Y value. Possible values are:<ul><li>T : cell top</li><li>C : center</li><li>B : cell bottom</li><li>A : font top</li><li>L : font baseline</li><li>D : font bottom</li></ul>
 * @method string getValign() text vertical alignment inside the cell. Possible values are:<ul><li>T : top</li><li>C : center</li><li>B : bottom</li></ul>
 *
 * @method void write()
 * @method void render()
 */
class CellOp extends AbstractOp {

	/**
	 * @var array
	 */
	protected static $defaultArguments = array(
			'w' => null,
			'h' => 0,
			'txt' => '',
			'border' => 0,
			'ln' => 0,
			'align' => '',
			'fill' => false,
			'link' => '',
			'stretch' => 0,
			'ignoreMinHeight' => false,
			'calign' => 'T',
			'valign' => 'M',
	);

	/**
	 * @var string
	 */
	protected static $method = 'Cell';

	/**
	 * @return void
	 */
	public function put() {
		$this->assertArgExists('w');
		parent::put();
	}

	/**
	 * Sets size.
	 * @param float $w Cell width. If 0, the cell extends up to the right margin.
	 * @param float $h Cell height. Default value: 0.
	 * @return CellOp
	 */
	public function setWH($w, $h) {
		return $this->setW($w)->setH($h);
	}

	/**
	 * Sets size.
	 * @param float $w Cell width. If 0, the cell extends up to the right margin.
	 * @param float $h Cell height. Default value: 0.
	 * @return CellOp
	 */
	public function setSize($w, $h) {
		return $this->setW($w)->setH($h);
	}

}
