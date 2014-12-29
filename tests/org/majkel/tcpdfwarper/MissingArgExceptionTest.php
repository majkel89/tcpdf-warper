<?php
/**
 * Created by PhpStorm.
 * User: Michał (majkel) Kowalik <maf.michal@gmail.com>
 * Date: 12/28/2014
 * Time: 22:36
 */

namespace org\majkel\tcpdfwarper;

/**
 * Class TCPDFWarperTest
 * @package org\majkel\tcpdfwarper
 * @coversDefaultClass \org\majkel\tcpdfwarper\MissingArgExceptionTest
 */
class MissingArgExceptionTest extends \PHPUnit_Framework_TestCase {

	public function testException() {
		$previous = new \Exception();
		$code = 123;
		$argument = 'argument';
		$message = sprintf(MissingArgException::MESSAGE, $argument);

		$e = new MissingArgException($argument, $code, $previous);

		self::assertSame($previous, $e->getPrevious());
		self::assertSame($code, $e->getCode());
		self::assertSame($argument, $e->getArgumentName());
		self::assertSame($message, $e->getMessage());
	}

}