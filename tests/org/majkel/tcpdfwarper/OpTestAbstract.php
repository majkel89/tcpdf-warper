<?php
/**
 * Created by PhpStorm.
 * Package: org\majkel\tcpdfwarper
 * User: Michał (majkel) Kowalik <maf.michal@gmail.com>
 * Date: 12/28/2014
 * Time: 20:41
 */

namespace org\majkel\tcpdfwarper;

require_once 'AbstractTestCase.php';

/**
 * Class OpTestAbstract
 * @package org\majkel\tcpdfwarper
 */
abstract class OpTestAbstract extends AbstractTestCase {

	/**
	 * @return string
	 */
	abstract protected function getClass();

	/**
	 * @return string
	 */
	abstract protected function getMethod();

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
		$class = new \ReflectionClass($this->getTcpdfClass());
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

		foreach (array_keys($this->getExceptedArguments()) as $arg) {
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
			self::fail("Doc invalid:\n\t".implode("\n\t", $invalidArgs));
		}
		self::success();
	}

	/**
	 * @covers ::put
	 */
	public function testPut() {
		$arguments = $this->constructArguments();

		$pdf = $this->getTcpdfMock();
		$pdf->expects(self::once())
				->method($this->getMethod())
				->withConsecutive($arguments);

		$obj = $this->getObject($pdf);
		foreach (array_reverse($arguments) as $key => $value) {
			$obj->$key = $value;
		}

		$obj->put();
	}

	protected function set2ArgsTest($method, $p1, $p2) {
		$obj = $this->getObject();
		$obj->$method(1, 2);
		self::assertSame(1, $obj->$p1);
		self::assertSame(2, $obj->$p2);
	}

	protected function setWHTest() {
		$this->set2ArgsTest('setWH', 'w', 'h');
	}

	protected function setSizeTest() {
		$this->set2ArgsTest('setSize', 'w', 'h');
	}

	protected function setXYTest() {
		$this->set2ArgsTest('setXY', 'x', 'y');
	}

	protected function setPosTest() {
		$this->set2ArgsTest('setPos', 'x', 'y');
	}
}
