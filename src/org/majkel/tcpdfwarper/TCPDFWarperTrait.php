<?php
/**
 * Created by Generator.
 * Package: org\majkel\tcpdfwarper
 * User: Michał (majkel) Kowalik <maf.michal@gmail.com>
 * Date: 2015-01-19
 * Time: 02:40:34
 */

namespace org\majkel\tcpdfwarper;

/**
 * Class TCPDFWarperTrait
 * @package org\majkel\tcpdfwarper
 */
trait TCPDFWarperTrait {

	/**
	 * Prints a cell (rectangular area) with optional borders, background color and character string. The upper-left corner of the cell corresponds to the current position. The text can be aligned or centered. After the call, the current position moves to the right or to the next line. It is possible to put a link on the text.<br />
	 * If automatic page breaking is enabled and the cell goes beyond the limit, a page break is done before outputting.
	 *
	 * @return CellOp
	 */
	public function buildCell() {
		return new CellOp($this);
	}

	/**
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
	 * @return ImageOp
	 */
	public function buildImage() {
		return new ImageOp($this);
	}

	/**
	 * Embedd a Scalable Vector Graphics (SVG) image.
	 * NOTE: SVG standard is not yet fully implemented, use the setRasterizeVectorImages() method to enable/disable rasterization of vector images using ImageMagick library.
	 *
	 * @return ImageSvgOp
	 */
	public function buildImageSvg() {
		return new ImageSvgOp($this);
	}

	/**
	 * Embed vector-based Adobe Illustrator (AI) or AI-compatible EPS files.
	 * NOTE: EPS is not yet fully implemented, use the setRasterizeVectorImages() method to enable/disable rasterization of vector images using ImageMagick library.
	 * Only vector drawing is supported, not text or bitmap.
	 * Although the script was successfully tested with various AI format versions, best results are probably achieved with files that were exported in the AI3 format (tested with Illustrator CS2, Freehand MX and Photoshop CS2).
	 *
	 * @return ImageEpsOp
	 */
	public function buildImageEps() {
		return new ImageEpsOp($this);
	}

	/**
	 * This method allows printing text with line breaks.
	 * They can be automatic (as soon as the text reaches the right border of the cell) or explicit (via the \n character). As many cells as necessary are output, one below the other.<br />
	 * Text can be aligned, centered or justified. The cell block can be framed and the background painted.
	 *
	 * @return MultiCellOp
	 */
	public function buildMultiCell() {
		return new MultiCellOp($this);
	}

	/**
	 * Prints a text cell at the specified position.
	 * This method allows to place a string precisely on the page.
	 *
	 * @return TextOp
	 */
	public function buildText() {
		return new TextOp($this);
	}

	/**
	 * Allows to preserve some HTML formatting (limited support).<br />
	 * IMPORTANT: The HTML must be well formatted - try to clean-up it using an application like HTML-Tidy before submitting.
	 * Supported tags are: a, b, blockquote, br, dd, del, div, dl, dt, em, font, h1, h2, h3, h4, h5, h6, hr, i, img, li, ol, p, pre, small, span, strong, sub, sup, table, tcpdf, td, th, thead, tr, tt, u, ul
	 * NOTE: all the HTML attributes must be enclosed in double-quote.
	 *
	 * @return HtmlOp
	 */
	public function buildHtml() {
		return new HtmlOp($this);
	}

	/**
	 * Prints a cell (rectangular area) with optional borders, background color and html text string.
	 * The upper-left corner of the cell corresponds to the current position. After the call, the current position moves to the right or to the next line.<br />
	 * If automatic page breaking is enabled and the cell goes beyond the limit, a page break is done before outputting.
	 * IMPORTANT: The HTML must be well formatted - try to clean-up it using an application like HTML-Tidy before submitting.
	 * Supported tags are: a, b, blockquote, br, dd, del, div, dl, dt, em, font, h1, h2, h3, h4, h5, h6, hr, i, img, li, ol, p, pre, small, span, strong, sub, sup, table, tcpdf, td, th, thead, tr, tt, u, ul
	 * NOTE: all the HTML attributes must be enclosed in double-quote.
	 *
	 * @return HtmlCellOp
	 */
	public function buildHtmlCell() {
		return new HtmlCellOp($this);
	}

	/**
	 * Print a Linear Barcode.
	 *
	 * @return Barcode1dOp
	 */
	public function buildBarcode1d() {
		return new Barcode1dOp($this);
	}

	/**
	 * Print 2D Barcode.
	 *
	 * @return Barcode2dOp
	 */
	public function buildBarcode2d() {
		return new Barcode2dOp($this);
	}

	/**
	 * This method prints text from the current position.<br />
	 *
	 * @return WriteOp
	 */
	public function buildWrite() {
		return new WriteOp($this);
	}

}
