<?php
/**
 * Based on TCPDF example 001
 * See: http://www.tcpdf.org/examples.php
 * User: Michał (majkel) Kowalik <maf.michal@gmail.com>
 * Date: 1/8/2015
 * Time: 00:00
 */

namespace org\majkel;

chdir(__DIR__);

require_once  '../vendor/autoload.php';

class PDF extends \TCPDF {
	use tcpdfwarper\TCPDFWarperTrait;
}

$pdf = new PDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 001');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
$pdf->setFontSubsetting(true);
$pdf->SetFont('dejavusans', '', 14, '', true);

$pdf->AddPage();

$html = <<<EOD
<h1>Welcome to <a href="http://www.tcpdf.org"
  style="text-decoration:none;background-color:#CC0000;">
  &nbsp;<span style="color:black;">TC</span><span style="color:white;">PDF</span>&nbsp;</a>!
</h1>
<i>This is the first example of TCPDF library.</i>
<p>This text is printed using the <i>writeHTMLCell()</i> method but you can also use:
  <i>Multicell(),writeHTML(), Write(), Cell() and Text()</i>.</p>
<p>Please check the source code documentation and other examples for further information.</p>
<p style="color:#CC0000;">TO IMPROVE AND EXPAND TCPDF I NEED YOUR SUPPORT, PLEASE
  <a href="http://sourceforge.net/donate/index.php?group_id=128076">MAKE A DONATION!</a>
</p>
<br/>
EOD;

$pdf->buildMulticell()
		->setSize(0, 0)
		->setTxt($html)
		->setIshtml(true)
		->render();

$pdf->buildImage()
		->setFile('image-01.jpg')
		->setPalign('C')
		->setLink('https://github.com/majkel89/tcpdf-warper')
		->render();

$pdf->Output('example_001.pdf', 'I');
