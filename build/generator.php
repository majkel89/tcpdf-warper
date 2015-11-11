#!php
<?php
/**
 * Created by PhpStorm.
 * User: Michał (majkel) Kowalik <maf.michal@gmail.com>
 * Date: 1/17/2015
 * Time: 21:27
 */

require_once __DIR__.'/../vendor/autoload.php';

use org\majkel\tcpdfwarper\generator\Generator;

$generator = new Generator(array(
		'configFile' => __DIR__.'/generator.config.php',
		'classTemplateFile' => __DIR__.'/generator.class.template.php',
		'traitTemplateFile' => __DIR__.'/generator.trait.template.php',
));

$generator->generate(__DIR__.'/../src/org/majkel/tcpdfwarper');
