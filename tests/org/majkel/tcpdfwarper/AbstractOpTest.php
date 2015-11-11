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
	 * @return \org\majkel\tcpdfwarper\AbstractOp
	 */
	private function getObject() {
		return $this->mock(self::CLS)
				->getDefaultArguments(array(), array())
				->getMethod(null);
	}

	/**
	 * @covers ::render
	 */
	public function testRender() {
		$obj = $this->getObject()
				->put($this->once())
				->new();
		$obj->render();
	}

	/**
	 * @covers ::write
	 */
	public function testWrite() {
		$obj = $this->getObject()
				->put($this->once())
				->new();
		$obj->write();
	}

	/**
	 * @covers ::put
	 */
	public function testPut() {
		$pdf = $this->getTcpdfMock();
		$pdf->expects($this->once())
				->method('AddSpotColor')
				->with(1, 2, 3, 4, 5);
		$obj = $this->getObject()
				->getTcpdf($pdf)
				->getArguments([], [1, 2, 3, 4, 5])
				->getMethod('AddSpotColor')
				->new();
		$obj->put();
	}

	/**
	 * @covers ::__construct
	 */
	public function testConstruct() {
		$pdf = new \stdClass;
		$obj = $this->getObject()->new($pdf);
		self::assertSame($pdf, $obj->getTcpdf());
	}

	/**
	 * @covers ::setTcpdf
	 * @covers ::getTcpdf
	 */
	public function testSettersTcpdf() {
		$obj = $this->getObject()->new();

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
		$obj = $this->getObject()->new();
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
		$obj = $this->getObject()->new();
		$this->reflect($obj)->assertArgExists('property');
	}

	/**
	 * @covers ::assertArgsExist
	 */
	public function testAssertArgsExist() {
		$obj = $this->getObject()->new();
		$obj->property = true;
		$this->reflect($obj)->assertArgsExist(array('property'));
		$this->success();
	}

	/**
	 * @expectedException \org\majkel\tcpdfwarper\MissingArgException
	 * @expectedExceptionMessage Argument `property` is missing
	 * @covers ::assertArgsExist
	 */
	public function testAssertArgsExistException() {
		$obj = $this->getObject()->new();
		$this->reflect($obj)->assertArgsExist(array('property'));
	}

	/**
	 * @covers ::setArguments
	 */
	public function testSetArguments() {
		$obj = $this->getObject()->new();
		$obj->setArguments(array(
			'property' => 1
		));
		self::assertSame(1, $obj->property);
	}

	/**
	 * @covers ::getArguments
	 */
	public function testGetArguments() {
		$obj = $this->mock(self::CLS)
				->getMethod()
				->getDefaultArguments(array(), array(
					'a' => 1,
					'b' => 1,
					'c' => 1,
				))
				->new();
		$obj->d = 2;
		$obj->c = 2;
		$obj->b = 2;
		$actualArgs = $obj->getArguments();
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
		$obj = $this->getObject()->new();

		self::assertFalse(isset($obj->property));

		$obj->property = 1;

		self::assertSame(1, $obj->property);
		self::assertTrue(isset($obj->property));

		unset($obj->property);

		self::assertFalse(isset($obj->property));
	}

	public function testMagicArgumentsSetters() {
		$obj = $this->getObject()->new();

		self::assertNull($obj->getProperty());

		$obj->setProperty(1);

		self::assertSame(1, $obj->getProperty());

		$obj->setProperty();

		self::assertNull($obj->getProperty());
	}

	public function testSetPropCamelCase() {
		$obj = $this->getObject()->new();

		$obj->propCamelCase = 1;

		self::assertSame(1, $obj->getPropCamelCase());
	}

	public function testSetMethodCamelCase() {
		$obj = $this->getObject()->new();

		$obj->setPropCamelCase(1);

		self::assertSame(1, $obj->propCamelCase);
	}

	/**
	 * @expectedException \org\majkel\tcpdfwarper\MissingMethodException
	 * @expectedExceptionMessage Call to undefined method `doesNotExists`
	 */
	public function testMagicArgumentsSettersException() {
		$obj = $this->getObject()->new();
		$obj->doesNotExists();
	}
}
