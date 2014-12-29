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
		}, trim($name, '_'));
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
		foreach ($arguments as $key => $value) {
			$arguments[$key] = rand(10000, 99999);
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
	 * @coversNothing
	 */
	public function testDocConfiguration() {
		$class = new \ReflectionClass($this->getClass());
		$comment = $class->getDocComment();

		$shortClass = $class->getShortName();
		$invalidArgs = array();

		foreach (array_keys($this->getExceptedArguments()) as $argName) {
			$arg = $this->processArgName($argName);
			$Arg = ucfirst($arg);

			$patternProp = "#\s@property\s+\w+\s+\\\$$arg\s#";
			if (!preg_match($patternProp, $comment)) {
				$invalidArgs[] = "Invalid property `$arg` ($patternProp)";
			}

			$patternSetter = "#\s@method\s+$shortClass\s+set{$Arg}\(\w+\s+\\\$$arg\)#";
			if (!preg_match($patternSetter, $comment)) {
				$invalidArgs[] = "Invalid setter `$arg` ($patternSetter)";
			}

			$patternGetter = "#\s@method\s+\w+\s+get{$Arg}\(\)#";
			if (!preg_match($patternGetter, $comment)) {
				$invalidArgs[] = "Invalid getter `$arg` ($patternGetter)";
			}
		}

		if (count($invalidArgs) > 0) {
			self::fail("Doc invalid:\n\t".implode("\n\t",$invalidArgs));
		}
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

	protected function _testSet2Args($method, $p1, $p2) {
		$obj = $this->getObject();
		$obj->$method(1, 2);
		self::assertSame(1, $obj->$p1);
		self::assertSame(2, $obj->$p2);
	}

	protected function _testSetWH() {
		$this->_testSet2Args('setWH', 'w', 'h');
	}

	protected function _testSetSize() {
		$this->_testSet2Args('setSize', 'w', 'h');
	}

	protected function _testSetXY() {
		$this->_testSet2Args('setXY', 'x', 'y');
	}

	protected function _testSetPos() {
		$this->_testSet2Args('setPos', 'x', 'y');
	}
}
