TCPDF Warper
============

[![Build Status](https://travis-ci.org/majkel89/tcpdf-warper.svg?branch=master)](https://travis-ci.org/majkel89/tcpdf-warper)

**Author**: Michał (majkel) Kowalik <maf.michal@gmail.com>

**Version**: 0.2.2

**Minimum PHP**: 5.4

Installation
------------

     composer require tecnick.com/tcpdf       ### or any TCPDF library
     composer require org.majkel/tcpdfwarper

About
-----

Provides fluent statement builders for TCPDF library.

Mine intention was to make calls to methods, with many arguments,
clearer and more maintainable.

    // instead of
    $pdf = new \TCPDF();
    $pdf->Image($file, $x, $y, $w, $h, '', '', '', true, 300, '',
             true, false, 10, true, false, false, true, $altimgs);

    // you can use this
    $pdf = new \org\majkel\tcpdfwarper\TCPDFWarper();
    $pdf->buildImage()->setFile($file)
        ->setPos(20, 20)->setSize(64, 64)
        ->setAlt(true)->setAltImgs($altimgs)
        ->render();

No more hassle with remembering which argument is which or hardcodeing long list of
parameters just to change last one of them.

Following methods are supported

  * Cell (buildCell)
  * Multicell (buildMulticell)
  * Image (buildImage)
  * ImageSvg (buildImageSvg)
  * ImageEps (buildImageEps)
  * Text (buildText)
  * writeHTML (buildHtml)
  * writeHTMLCell (buildHtmlCell)
  * write1DBarcode (buildBarcode1d)
  * write2DBarcode (buildBarcode2d)
  * Write (buildWrite)

If you are using some kind of fork of TCPDF, you can write your own warper.
Every statement builder allows you to inject $tcpdf object.

     $image = new \org\majkel\tcpdfwarper\ImageOp($tcpdf);
     $image->setFile($file)
         ->setPos(20, 20)->setSize(64, 64)
         ->render();

Features
========

  - Fully unit tested
  - Full code coverage
  - Code completion friendly (including documentation)
  - Tested against multiple php versions (5.4 - 7.0, hhvm)
  - Tested against multiple TCPDF libraries (see travis)
