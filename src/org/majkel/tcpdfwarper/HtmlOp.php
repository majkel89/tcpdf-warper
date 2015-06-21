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
 * Class HtmlOp
 * @package org\majkel\tcpdfwarper
 *
 * Allows to preserve some HTML formatting (limited support).<br />
 * IMPORTANT: The HTML must be well formatted - try to clean-up it using an application like HTML-Tidy before submitting.
 * Supported tags are: a, b, blockquote, br, dd, del, div, dl, dt, em, font, h1, h2, h3, h4, h5, h6, hr, i, img, li, ol, p, pre, small, span, strong, sub, sup, table, tcpdf, td, th, thead, tr, tt, u, ul
 * NOTE: all the HTML attributes must be enclosed in double-quote.
 *
 * @property string $html text to display
 * @property boolean $ln if true add a new line after text (default = true)
 * @property boolean $fill Indicates if the background must be painted (true) or transparent (false).
 * @property boolean $reseth if true reset the last cell height (default false).
 * @property boolean $cell if true add the current left (or right for RTL) padding to each Write (default false).
 * @property string $align Allows to center or align the text. Possible values are:<ul><li>L : left align</li><li>C : center</li><li>R : right align</li><li>'' : empty string : left for LTR or right for RTL</li></ul>
 *
 * @method HtmlOp setHtml(string $html) text to display
 * @method HtmlOp setLn(boolean $ln) if true add a new line after text (default = true)
 * @method HtmlOp setFill(boolean $fill) Indicates if the background must be painted (true) or transparent (false).
 * @method HtmlOp setReseth(boolean $reseth) if true reset the last cell height (default false).
 * @method HtmlOp setCell(boolean $cell) if true add the current left (or right for RTL) padding to each Write (default false).
 * @method HtmlOp setAlign(string $align) Allows to center or align the text. Possible values are:<ul><li>L : left align</li><li>C : center</li><li>R : right align</li><li>'' : empty string : left for LTR or right for RTL</li></ul>
 *
 * @method string getHtml() text to display
 * @method boolean getLn() if true add a new line after text (default = true)
 * @method boolean getFill() Indicates if the background must be painted (true) or transparent (false).
 * @method boolean getReseth() if true reset the last cell height (default false).
 * @method boolean getCell() if true add the current left (or right for RTL) padding to each Write (default false).
 * @method string getAlign() Allows to center or align the text. Possible values are:<ul><li>L : left align</li><li>C : center</li><li>R : right align</li><li>'' : empty string : left for LTR or right for RTL</li></ul>
 *
 * @method void write()
 * @method void render()
 */
class HtmlOp extends AbstractOp {

	/**
	 * @var array
	 */
	protected static $defaultArguments = array(
			'html' => null,
			'ln' => true,
			'fill' => false,
			'reseth' => false,
			'cell' => false,
			'align' => '',
	);

	/**
	 * @var string
	 */
	protected static $method = 'writeHTML';

	/**
	 * @return void
	 */
	public function put() {
		$this->assertArgExists('html');
		parent::put();
	}

}
