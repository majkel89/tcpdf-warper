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
 * @coversDefaultClass \org\majkel\tcpdfwarper\MissingMethodException
 */
class MissingMethodExceptionTest extends \PHPUnit_Framework_TestCase {

	public function testException() {
		$previous = new \Exception();
		$code = 123;
		$method = 'method';
		$args = array(1, 2, 3);
		$message = sprintf(MissingMethodException::MESSAGE, $method, $args);

		$e = new MissingMethodException($method, $args, $code, $previous);

		self::assertSame($previous, $e->getPrevious());
		self::assertSame($code, $e->getCode());
		self::assertSame($method, $e->getMethodName());
		self::assertSame($args, $e->getArguments());
		self::assertSame($message, $e->getMessage());
	}

}
