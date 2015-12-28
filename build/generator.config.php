<?php
/**
 * Created by PhpStorm.
 * User: Michał (majkel) Kowalik <maf.michal@gmail.com>
 * Date: 1/17/2015
 * Time: 20:44
 */

$_xy = array(
		'name' => 'XY',
		'args' => array('x', 'y'),
		'doc' => 'Sets position.',
);

$_pos = array(
		'name' => 'pos',
		'args' => array('x', 'y'),
		'doc' => 'Sets position.',
);

$_wh = array(
		'name' => 'WH',
		'args' => array('w', 'h'),
		'doc' => 'Sets size.',
);

$_size = array(
		'name' => 'size',
		'args' => array('w', 'h'),
		'doc' => 'Sets size.',
);

$_barcode1dCodeDoc = <<<EOF
<ul>
	<li>C39 : CODE 39 - ANSI MH10.8M-1983 - USD-3 - 3 of 9.</li>
	<li>C39+ : CODE 39 with checksum</li>
	<li>C39E : CODE 39 EXTENDED</li>
	<li>C39E+ : CODE 39 EXTENDED + CHECKSUM</li>
	<li>C93 : CODE 93 - USS-93</li>
	<li>S25 : Standard 2 of 5</li>
	<li>S25+ : Standard 2 of 5 + CHECKSUM</li>
	<li>I25 : Interleaved 2 of 5</li>
	<li>I25+ : Interleaved 2 of 5 + CHECKSUM</li>
	<li>C128 : CODE 128</li>
	<li>C128A : CODE 128 A</li>
	<li>C128B : CODE 128 B</li>
	<li>C128C : CODE 128 C</li>
	<li>EAN2 : 2-Digits UPC-Based Extension</li>
	<li>EAN5 : 5-Digits UPC-Based Extension</li>
	<li>EAN8 : EAN 8</li>
	<li>EAN13 : EAN 13</li>
	<li>UPCA : UPC-A</li>
	<li>UPCE : UPC-E</li>
	<li>MSI : MSI (Variation of Plessey code)</li>
	<li>MSI+ : MSI + CHECKSUM (modulo 11)</li>
	<li>POSTNET : POSTNET</li>
	<li>PLANET : PLANET</li>
	<li>RMS4CC : RMS4CC (Royal Mail 4-state Customer Code) - CBC (Customer Bar Code)</li>
	<li>KIX : KIX (Klant index - Customer index)</li>
	<li>IMB: Intelligent Mail Barcode - Onecode - USPS-B-3200</li>
	<li>CODABAR : CODABAR</li>
	<li>CODE11 : CODE 11</li>
	<li>PHARMA : PHARMACODE</li>
	<li>PHARMA2T : PHARMACODE TWO-TRACKS</li>
</ul>
EOF;

$_barcode2dCodeDoc = <<<EOF
<ul>
	<li>DATAMATRIX : Datamatrix (ISO/IEC 16022)</li>
	<li>PDF417 : PDF417 (ISO/IEC 15438:2006)</li>
	<li>PDF417,a,e,t,s,f,o0,o1,o2,o3,o4,o5,o6 : PDF417 with parameters: a = aspect ratio (width/height); e = error correction level (0-8); t = total number of macro segments; s = macro segment index (0-99998); f = file ID; o0 = File Name (text); o1 = Segment Count (numeric); o2 = Time Stamp (numeric); o3 = Sender (text); o4 = Addressee (text); o5 = File Size (numeric); o6 = Checksum (numeric). NOTES: Parameters t, s and f are required for a Macro Control Block, all other parametrs are optional. To use a comma character ',' on text options, replace it with the character 255: "\xff".</li>
	<li>QRCODE : QRcode Low error correction</li>
	<li>QRCODE,L : QRcode Low error correction</li>
	<li>QRCODE,M : QRcode Medium error correction</li>
	<li>QRCODE,Q : QRcode Better error correction</li>
	<li>QRCODE,H : QR-CODE Best error correction</li>
	<li>RAW: raw mode - comma-separad list of array rows</li>
	<li>RAW2: raw mode - array rows are surrounded by square parenthesis.</li>
	<li>TEST : Test matrix</li>
</ul>
EOF;

return array(
		'Cell' => array(
				'metaMethods' => array($_wh, $_size),
		),
		'Image' => array(
				'metaMethods' => array($_xy, $_pos, $_wh, $_size),
		),
		'ImageSvg' => array(
				'metaMethods' => array($_xy, $_pos, $_wh, $_size),
		),
		'ImageEps' => array(
				'metaMethods' => array($_xy, $_pos, $_wh, $_size),
		),
		'MultiCell' => array(
				'metaMethods' => array($_xy, $_pos, $_wh, $_size),
		),
		'Text' => array(
				'metaMethods' => array($_xy, $_pos),
		),
		'writeHTML' => array(
				'className' => 'Html',
		),
		'writeHTMLCell' => array(
				'className' => 'HtmlCell',
				'metaMethods' => array($_xy, $_pos, $_wh, $_size),
		),
		'write1DBarcode' => array(
				'className' => 'Barcode1d',
				'metaMethods' => array($_xy, $_pos, $_wh, $_size),
				'additionalDoc' => array(
						'type' => $_barcode1dCodeDoc
				),
		),
		'write2DBarcode' => array(
				'className' => 'Barcode2d',
				'metaMethods' => array($_xy, $_pos, $_wh, $_size),
				'additionalDoc' => array(
						'type' => $_barcode2dCodeDoc
				),
		),
		'Write',
);
