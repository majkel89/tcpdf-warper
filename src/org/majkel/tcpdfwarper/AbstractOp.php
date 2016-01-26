<?php
/**
 * Created by PhpStorm.
 * Package: org\majkel\tcpdfwarper
 * User: Michał (majkel) Kowalik <maf.michal@gmail.com>
 * Date: 12/28/2014
 * Time: 15:28
 */

namespace org\majkel\tcpdfwarper;

/**
 * Class AbstractOp
 * @package org\majkel\tcpdfwarper
 */
abstract class AbstractOp {

	/**
	 * @var \TCPDF
	 */
	protected $opTcpdf;

	/**
	 * @var array
	 */
	protected $opArguments = array();

	/**
	 * @param \TCPDF $tcpdf
	 */
	public function __construct($tcpdf) {
		$this->opTcpdf = $tcpdf;
	}

	/**
	 * @return \TCPDF
	 */
	public function getTcpdf() {
		return $this->opTcpdf;
	}

	/**
	 * @param $tcpdf \TCPDF
	 * @return void
	 */
	public function setTcpdf($tcpdf) {
		$this->opTcpdf = is_object($tcpdf) ? $tcpdf : $this->opTcpdf;
	}

	/**
	 * Alias of put
	 * @return mixed
	 * @see ::put
	 */
	public function render() {
		return $this->put();
	}

	/**
	 * Alias of put
	 * @return mixed
	 * @see ::put
	 */
	public function write() {
		return $this->put();
	}

	/**
	 * @return mixed
	 */
	public function put() {
		return call_user_func_array(array($this->getTcpdf(), $this->getMethod()), $this->getArguments());
	}

	/**
	 * @param string $name
	 * @param mixed $value
	 */
	public function __set($name, $value) {
		$this->opArguments[$name] = $value;
	}

	/**
	 * @param string $name
	 */
	public function __unset($name) {
		unset($this->opArguments[$name]);
	}

	/**
	 * @param string $name
	 * @return bool
	 */
	public function __isset($name) {
		return isset($this->opArguments[$name]);
	}

	/**
	 * @param string $name
	 * @return mixed
	 */
	public function __get($name) {
		return isset($this->opArguments[$name]) ? $this->opArguments[$name] : null;
	}

	/**
	 * @param string $name
	 * @param array $arguments
	 * @return $this|mixed
	 * @throws \org\majkel\tcpdfwarper\MissingMethodException
	 */
	public function __call($name, $arguments) {
		$prefix = substr($name, 0, 3);
		$suffix = lcfirst(substr($name, 3));
		if ($prefix === 'set') {
			$this->$suffix = count($arguments) > 0 ? $arguments[0] : null;
			return $this;
		}
		if ($prefix === 'get') {
			return $this->$suffix;
		}
		throw new MissingMethodException($name, $arguments);
	}

	/**
	 * @return array
	 */
	public function getArguments() {
		return array_merge($this->getDefaultArguments(), $this->opArguments);
	}

	/**
	 * @param array $arguments
	 * @return $this
	 */
	public function setArguments(array $arguments) {
		$this->opArguments = $arguments;
		return $this;
	}

	/**
	 * @param string $argName
	 * @throws \org\majkel\tcpdfwarper\MissingArgException
	 */
	protected function assertArgExists($argName) {
		if (!isset($this->opArguments[$argName])) {
			throw new MissingArgException($argName);
		}
	}

	/**
	 * @param string[] $arguments
	 * @throws MissingArgException
	 */
	protected function assertArgsExist(array $arguments) {
		foreach ($arguments as $argument) {
			$this->assertArgExists($argument);
		}
	}

	/**
	 * @return array
	 */
	abstract protected function getDefaultArguments();

	/**
	* @return string
	*/
	abstract protected function getMethod();
}
