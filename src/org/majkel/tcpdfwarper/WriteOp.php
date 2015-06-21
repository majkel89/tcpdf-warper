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
 * Class WriteOp
 * @package org\majkel\tcpdfwarper
 *
 * This method prints text from the current position.<br />
 *
 * @property float $h Line height
 * @property string $txt String to print
 * @property mixed $link URL or identifier returned by AddLink()
 * @property boolean $fill Indicates if the cell background must be painted (true) or transparent (false).
 * @property string $align Allows to center or align the text. Possible values are:<ul><li>L or empty string: left align (default value)</li><li>C: center</li><li>R: right align</li><li>J: justify</li></ul>
 * @property boolean $ln if true set cursor at the bottom of the line, otherwise set cursor at the top of the line.
 * @property int $stretch font stretch mode: <ul><li>0 = disabled</li><li>1 = horizontal scaling only if text is larger than cell width</li><li>2 = forced horizontal scaling to fit cell width</li><li>3 = character spacing only if text is larger than cell width</li><li>4 = forced character spacing to fit cell width</li></ul> General font stretching and scaling values will be preserved when possible.
 * @property boolean $firstline if true prints only the first line and return the remaining string.
 * @property boolean $firstblock if true the string is the starting of a line.
 * @property float $maxh maximum height. It should be >= $h and less then remaining space to the bottom of the page, or 0 for disable this feature.
 * @property float $wadj first line width will be reduced by this amount (used in HTML mode).
 * @property array $margin margin array of the parent container
 *
 * @method WriteOp setH(float $h) Line height
 * @method WriteOp setTxt(string $txt) String to print
 * @method WriteOp setLink(mixed $link) URL or identifier returned by AddLink()
 * @method WriteOp setFill(boolean $fill) Indicates if the cell background must be painted (true) or transparent (false).
 * @method WriteOp setAlign(string $align) Allows to center or align the text. Possible values are:<ul><li>L or empty string: left align (default value)</li><li>C: center</li><li>R: right align</li><li>J: justify</li></ul>
 * @method WriteOp setLn(boolean $ln) if true set cursor at the bottom of the line, otherwise set cursor at the top of the line.
 * @method WriteOp setStretch(int $stretch) font stretch mode: <ul><li>0 = disabled</li><li>1 = horizontal scaling only if text is larger than cell width</li><li>2 = forced horizontal scaling to fit cell width</li><li>3 = character spacing only if text is larger than cell width</li><li>4 = forced character spacing to fit cell width</li></ul> General font stretching and scaling values will be preserved when possible.
 * @method WriteOp setFirstline(boolean $firstline) if true prints only the first line and return the remaining string.
 * @method WriteOp setFirstblock(boolean $firstblock) if true the string is the starting of a line.
 * @method WriteOp setMaxh(float $maxh) maximum height. It should be >= $h and less then remaining space to the bottom of the page, or 0 for disable this feature.
 * @method WriteOp setWadj(float $wadj) first line width will be reduced by this amount (used in HTML mode).
 * @method WriteOp setMargin(array $margin) margin array of the parent container
 *
 * @method float getH() Line height
 * @method string getTxt() String to print
 * @method mixed getLink() URL or identifier returned by AddLink()
 * @method boolean getFill() Indicates if the cell background must be painted (true) or transparent (false).
 * @method string getAlign() Allows to center or align the text. Possible values are:<ul><li>L or empty string: left align (default value)</li><li>C: center</li><li>R: right align</li><li>J: justify</li></ul>
 * @method boolean getLn() if true set cursor at the bottom of the line, otherwise set cursor at the top of the line.
 * @method int getStretch() font stretch mode: <ul><li>0 = disabled</li><li>1 = horizontal scaling only if text is larger than cell width</li><li>2 = forced horizontal scaling to fit cell width</li><li>3 = character spacing only if text is larger than cell width</li><li>4 = forced character spacing to fit cell width</li></ul> General font stretching and scaling values will be preserved when possible.
 * @method boolean getFirstline() if true prints only the first line and return the remaining string.
 * @method boolean getFirstblock() if true the string is the starting of a line.
 * @method float getMaxh() maximum height. It should be >= $h and less then remaining space to the bottom of the page, or 0 for disable this feature.
 * @method float getWadj() first line width will be reduced by this amount (used in HTML mode).
 * @method array getMargin() margin array of the parent container
 *
 * @method mixed write() Return the number of cells or the remaining string if $firstline = true.
	 *
 * @method mixed render() Return the number of cells or the remaining string if $firstline = true.
	 *
 */
class WriteOp extends AbstractOp {

	/**
	 * @var array
	 */
	protected static $defaultArguments = array(
			'h' => null,
			'txt' => null,
			'link' => '',
			'fill' => false,
			'align' => '',
			'ln' => false,
			'stretch' => 0,
			'firstline' => false,
			'firstblock' => false,
			'maxh' => 0,
			'wadj' => 0,
			'margin' => '',
	);

	/**
	 * @var string
	 */
	protected static $method = 'Write';

	/**
	 * @return mixed Return the number of cells or the remaining string if $firstline = true.
	 *
	 */
	public function put() {
		$this->assertArgExists('h');
		$this->assertArgExists('txt');
		return parent::put();
	}

}
