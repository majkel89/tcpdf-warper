<?php
/**
 * Created by PhpStorm.
 * User: Michał (majkel) Kowalik <maf.michal@gmail.com>
 * Date: 12/28/2014
 * Time: 20:41
 */

namespace org\majkel\tcpdfwarper;

use Xpmock\TestCaseTrait;

abstract class OpTestAbstract extends \PHPUnit_Framework_TestCase {

	use TestCaseTrait;

	/**
	 * @return string
	 */
	protected abstract function getClass();

	/**
	 * @return string
	 */
	protected abstract function getMethod();

	/**
	 * @param string $name
	 * @return string
	 */
	protected function processArgName($name) {
		return preg_replace_callback('#_([A-Za-z])#', function($matches){
			return strtoupper($matches[1]);
		}, $name);
	}

	/**
	 * @param \TCPDF $pdf
	 * @return AbstractOp
	 */
	protected function getObject($pdf = null) {
		$class = $this->getClass();
		return new $class($pdf);
	}

	protected function getExceptedArguments() {
		$class = new \ReflectionClass('TCPDF');
		$method = $class->getMethod($this->getMethod());
		$parameters = $method->getParameters();

		$exceptedArguments = array();

		foreach ($parameters as $parameter) {
			$name = $this->processArgName($parameter->getName());
			$exceptedArguments[$name] = $parameter->isOptional() ? $parameter->getDefaultValue() : null;
		}

		return $exceptedArguments;
	}

	protected function constructArguments() {
		$arguments = $this->getExceptedArguments();
		$index = 0;
		foreach ($arguments as $key => $value) {
			$arguments[$key] = $index++;
		}
		return $arguments;
	}

	/**
	 * @coversNothing
	 */
	public function testMethodConfiguration() {
		$method = $this->reflect($this->getClass())->method;
		self::assertSame($this->getMethod(), $method);
	}

	/**
	 * @coversNothing
	 */
	public function testDefaultArguments() {
		$exceptedArguments = $this->getExceptedArguments();

		$obj = $this->getObject();
		$actualArguments = $this->reflect($obj)->getArguments();

		self::assertSame($exceptedArguments, $actualArguments);
	}

	/**
	 * @covers ::put
	 */
	public function testPut() {
		$arguments = $this->constructArguments();

		$pdf = $this->getMockBuilder('TCPDF')
				->disableOriginalConstructor()
				->getMock();
		$pdf->expects(self::once())
				->method($this->getMethod())
				->withConsecutive($arguments);

		$obj = $this->getObject($pdf);
		foreach (array_reverse($arguments) as $key => $value) {
			$obj->$key = $value;
		}

		$obj->put();
	}

	protected function _testSet($method, $p1, $p2) {
		$obj = $this->getObject();
		$obj->$method(1, 2);
		self::assertSame(1, $obj->$p1);
		self::assertSame(2, $obj->$p2);
	}

	protected function _testSetWH() {
		$this->_testSet('setWH', 'w', 'h');
	}

	protected function _testSetSize() {
		$this->_testSet('setSize', 'w', 'h');
	}

	protected function _testSetXY() {
		$this->_testSet('setXY', 'x', 'y');
	}

	protected function _testSetPos() {
		$this->_testSet('setPos', 'x', 'y');
	}
}
