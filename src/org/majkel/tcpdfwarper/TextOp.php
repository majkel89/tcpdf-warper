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
 * Class TextOp
 * @package org\majkel\tcpdfwarper
 *
 * Prints a text cell at the specified position.
 * This method allows to place a string precisely on the page.
 *
 * @property float $x Abscissa of the cell origin
 * @property float $y Ordinate of the cell origin
 * @property string $txt String to print
 * @property int $fstroke outline size in user units (false = disable)
 * @property boolean $fclip if true activate clipping mode (you must call StartTransform() before this function and StopTransform() to stop the clipping tranformation).
 * @property boolean $ffill if true fills the text
 * @property mixed $border Indicates if borders must be drawn around the cell. The value can be a number:<ul><li>0: no border (default)</li><li>1: frame</li></ul> or a string containing some or all of the following characters (in any order):<ul><li>L: left</li><li>T: top</li><li>R: right</li><li>B: bottom</li></ul> or an array of line styles for each border group - for example: array('LTRB' => array('width' => 2, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)))
 * @property int $ln Indicates where the current position should go after the call. Possible values are:<ul><li>0: to the right (or left for RTL languages)</li><li>1: to the beginning of the next line</li><li>2: below</li></ul>Putting 1 is equivalent to putting 0 and calling Ln() just after. Default value: 0.
 * @property string $align Allows to center or align the text. Possible values are:<ul><li>L or empty string: left align (default value)</li><li>C: center</li><li>R: right align</li><li>J: justify</li></ul>
 * @property boolean $fill Indicates if the cell background must be painted (true) or transparent (false).
 * @property mixed $link URL or identifier returned by AddLink().
 * @property int $stretch font stretch mode: <ul><li>0 = disabled</li><li>1 = horizontal scaling only if text is larger than cell width</li><li>2 = forced horizontal scaling to fit cell width</li><li>3 = character spacing only if text is larger than cell width</li><li>4 = forced character spacing to fit cell width</li></ul> General font stretching and scaling values will be preserved when possible.
 * @property boolean $ignoreMinHeight if true ignore automatic minimum height value.
 * @property string $calign cell vertical alignment relative to the specified Y value. Possible values are:<ul><li>T : cell top</li><li>A : font top</li><li>L : font baseline</li><li>D : font bottom</li><li>B : cell bottom</li></ul>
 * @property string $valign text vertical alignment inside the cell. Possible values are:<ul><li>T : top</li><li>C : center</li><li>B : bottom</li></ul>
 * @property boolean $rtloff if true uses the page top-left corner as origin of axis for $x and $y initial position.
 *
 * @method TextOp setX(float $x) Abscissa of the cell origin
 * @method TextOp setY(float $y) Ordinate of the cell origin
 * @method TextOp setTxt(string $txt) String to print
 * @method TextOp setFstroke(int $fstroke) outline size in user units (false = disable)
 * @method TextOp setFclip(boolean $fclip) if true activate clipping mode (you must call StartTransform() before this function and StopTransform() to stop the clipping tranformation).
 * @method TextOp setFfill(boolean $ffill) if true fills the text
 * @method TextOp setBorder(mixed $border) Indicates if borders must be drawn around the cell. The value can be a number:<ul><li>0: no border (default)</li><li>1: frame</li></ul> or a string containing some or all of the following characters (in any order):<ul><li>L: left</li><li>T: top</li><li>R: right</li><li>B: bottom</li></ul> or an array of line styles for each border group - for example: array('LTRB' => array('width' => 2, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)))
 * @method TextOp setLn(int $ln) Indicates where the current position should go after the call. Possible values are:<ul><li>0: to the right (or left for RTL languages)</li><li>1: to the beginning of the next line</li><li>2: below</li></ul>Putting 1 is equivalent to putting 0 and calling Ln() just after. Default value: 0.
 * @method TextOp setAlign(string $align) Allows to center or align the text. Possible values are:<ul><li>L or empty string: left align (default value)</li><li>C: center</li><li>R: right align</li><li>J: justify</li></ul>
 * @method TextOp setFill(boolean $fill) Indicates if the cell background must be painted (true) or transparent (false).
 * @method TextOp setLink(mixed $link) URL or identifier returned by AddLink().
 * @method TextOp setStretch(int $stretch) font stretch mode: <ul><li>0 = disabled</li><li>1 = horizontal scaling only if text is larger than cell width</li><li>2 = forced horizontal scaling to fit cell width</li><li>3 = character spacing only if text is larger than cell width</li><li>4 = forced character spacing to fit cell width</li></ul> General font stretching and scaling values will be preserved when possible.
 * @method TextOp setIgnoreMinHeight(boolean $ignoreMinHeight) if true ignore automatic minimum height value.
 * @method TextOp setCalign(string $calign) cell vertical alignment relative to the specified Y value. Possible values are:<ul><li>T : cell top</li><li>A : font top</li><li>L : font baseline</li><li>D : font bottom</li><li>B : cell bottom</li></ul>
 * @method TextOp setValign(string $valign) text vertical alignment inside the cell. Possible values are:<ul><li>T : top</li><li>C : center</li><li>B : bottom</li></ul>
 * @method TextOp setRtloff(boolean $rtloff) if true uses the page top-left corner as origin of axis for $x and $y initial position.
 *
 * @method float getX() Abscissa of the cell origin
 * @method float getY() Ordinate of the cell origin
 * @method string getTxt() String to print
 * @method int getFstroke() outline size in user units (false = disable)
 * @method boolean getFclip() if true activate clipping mode (you must call StartTransform() before this function and StopTransform() to stop the clipping tranformation).
 * @method boolean getFfill() if true fills the text
 * @method mixed getBorder() Indicates if borders must be drawn around the cell. The value can be a number:<ul><li>0: no border (default)</li><li>1: frame</li></ul> or a string containing some or all of the following characters (in any order):<ul><li>L: left</li><li>T: top</li><li>R: right</li><li>B: bottom</li></ul> or an array of line styles for each border group - for example: array('LTRB' => array('width' => 2, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)))
 * @method int getLn() Indicates where the current position should go after the call. Possible values are:<ul><li>0: to the right (or left for RTL languages)</li><li>1: to the beginning of the next line</li><li>2: below</li></ul>Putting 1 is equivalent to putting 0 and calling Ln() just after. Default value: 0.
 * @method string getAlign() Allows to center or align the text. Possible values are:<ul><li>L or empty string: left align (default value)</li><li>C: center</li><li>R: right align</li><li>J: justify</li></ul>
 * @method boolean getFill() Indicates if the cell background must be painted (true) or transparent (false).
 * @method mixed getLink() URL or identifier returned by AddLink().
 * @method int getStretch() font stretch mode: <ul><li>0 = disabled</li><li>1 = horizontal scaling only if text is larger than cell width</li><li>2 = forced horizontal scaling to fit cell width</li><li>3 = character spacing only if text is larger than cell width</li><li>4 = forced character spacing to fit cell width</li></ul> General font stretching and scaling values will be preserved when possible.
 * @method boolean getIgnoreMinHeight() if true ignore automatic minimum height value.
 * @method string getCalign() cell vertical alignment relative to the specified Y value. Possible values are:<ul><li>T : cell top</li><li>A : font top</li><li>L : font baseline</li><li>D : font bottom</li><li>B : cell bottom</li></ul>
 * @method string getValign() text vertical alignment inside the cell. Possible values are:<ul><li>T : top</li><li>C : center</li><li>B : bottom</li></ul>
 * @method boolean getRtloff() if true uses the page top-left corner as origin of axis for $x and $y initial position.
 *
 * @method void write()
 * @method void render()
 */
class TextOp extends AbstractOp {

	/**
	 * @codeCoverageIgnore
	 * @return array
	 */
	protected function getDefaultArguments() {
		return array(
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
	}

	/**
	 * @codeCoverageIgnore
	 * @return string
	 */
	protected function getMethod() {
		return 'Text';
	}

	/**
	 * @return void
	 */
	public function put() {
		$this->assertArgExists('x');
		$this->assertArgExists('y');
		$this->assertArgExists('txt');
		parent::put();
	}

	/**
	 * Sets position.
	 * @param float $x Abscissa of the cell origin
	 * @param float $y Ordinate of the cell origin
	 * @return TextOp
	 */
	public function setXY($x, $y) {
		return $this->setX($x)->setY($y);
	}

	/**
	 * Sets position.
	 * @param float $x Abscissa of the cell origin
	 * @param float $y Ordinate of the cell origin
	 * @return TextOp
	 */
	public function setPos($x, $y) {
		return $this->setX($x)->setY($y);
	}

}
