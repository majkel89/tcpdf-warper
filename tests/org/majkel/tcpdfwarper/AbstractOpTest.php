<?php
/**
 * Created by PhpStorm.
 * Package: org\majkel\tcpdfwarper
 * User: Michał (majkel) Kowalik <maf.michal@gmail.com>
 * Date: 12/28/2014
 * Time: 18:17
 */

namespace org\majkel\tcpdfwarper;

require_once 'AbstractTestCase.php';

/**
 * Class AbstractOpTest
 * @package org\majkel\tcpdfwarper
 * @coversDefaultClass \org\majkel\tcpdfwarper\AbstractOp
 */
class AbstractOpTest extends AbstractTestCase {

	const CLS = '\org\majkel\tcpdfwarper\AbstractOp';

	/**
	 * @covers ::render
	 */
	public function testRender() {
		$obj = $this->mock(self::CLS)
				->put()->new();
		$obj->render();
		$this->success();
	}

	/**
	 * @covers ::write
	 */
	public function testWrite() {
		$obj = $this->mock(self::CLS)
				->put()->new();
		$obj->write();
		$this->success();
	}

	/**
	 * @covers ::put
	 */
	public function testPut() {
		$pdf = $this->getTcpdfMock();
		$pdf->expects($this->any())
				->method('AddSpotColor')
				->with(1, 2, 3, 4, 5);

		$this->reflect(self::CLS)->method = 'AddSpotColor';
		$obj = $this->mock(self::CLS)
				->getTcpdf($pdf)
				->getArguments([], [1, 2, 3, 4, 5])
				->new();
		$obj->put();
		$this->success();
	}

	/**
	 * @covers ::__construct
	 */
	public function testConstruct() {
		$pdf = new \stdClass;
		$obj = $this->mock(self::CLS)->new($pdf);
		self::assertSame($pdf, $obj->getTcpdf());
	}

	/**
	 * @covers ::setTcpdf
	 * @covers ::getTcpdf
	 */
	public function testSettersTcpdf() {
		$obj = $this->mock(self::CLS)->new();

		$obj->setTcpdf(33);
		self::assertNull($obj->getTcpdf());

		$pdf = new \stdClass;
		$obj->setTcpdf($pdf);
		self::assertSame($pdf, $obj->getTcpdf());

		$obj->setTcpdf(false);
		self::assertSame($pdf, $obj->getTcpdf());
	}

	/**
	 * @covers ::assertArgExists
	 */
	public function testAssertArgExists() {
		$obj = $this->mock(self::CLS)->new();
		$obj->setProperty(1);
		$this->reflect($obj)->assertArgExists('property');
		$this->success();
	}

	/**
	 * @expectedException \org\majkel\tcpdfwarper\MissingArgException
	 * @expectedExceptionMessage Argument `property` is missing
	 * @covers ::assertArgExists
	 */
	public function testAssertArgExistsException() {
		$obj = $this->mock(self::CLS)->new();
		$this->reflect($obj)->assertArgExists('property');
	}

	/**
	 * @covers ::getArguments
	 */
	public function testGetArguments() {
		$obj = $this->mock(self::CLS)->new();
		$this->reflect(self::CLS)->defaultArguments = array(
				'a' => 1,
				'b' => 1,
				'c' => 1,
		);
		$obj->d = 2;
		$obj->c = 2;
		$obj->b = 2;
		$actualArgs = $this->reflect($obj)->getArguments();
		self::assertSame(array(
				'a' => 1,
				'b' => 2,
				'c' => 2,
				'd' => 2,
		), $actualArgs);
	}

	/**
	 * @covers ::__set
	 * @covers ::__get
	 * @covers ::__call
	 * @covers ::__isset
	 * @covers ::__unset
	 */
	public function testMagicArguments() {
		$obj = $this->mock(self::CLS)->new();

		self::assertFalse(isset($obj->property));

		$obj->property = 1;

		self::assertSame(1, $obj->property);
		self::assertTrue(isset($obj->property));

		unset($obj->property);

		self::assertFalse(isset($obj->property));
	}

	public function testMagicArgumentsSetters() {
		$obj = $this->mock(self::CLS)->new();

		self::assertNull($obj->getProperty());

		$obj->setProperty(1);

		self::assertSame(1, $obj->getProperty());

		$obj->setProperty();

		self::assertNull($obj->getProperty());
	}

	/**
	 * @expectedException \org\majkel\tcpdfwarper\MissingMethodException
	 * @expectedExceptionMessage Call to undefined method `doesNotExists`
	 */
	public function testMagicArgumentsSettersException() {
		$obj = $this->mock(self::CLS)->new();
		$obj->doesNotExists();
	}
}
