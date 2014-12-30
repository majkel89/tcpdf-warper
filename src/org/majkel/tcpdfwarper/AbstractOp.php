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
	protected $_tcpdf;

	/**
	 * @var array
	 */
	protected $_arguments = array();

	/**
	 * @var array
	 */
	protected static $defaultArguments = array();

	/**
	 * @var string
	 */
	protected static $method = '';

	/**
	 * @param \TCPDF $tcpdf
	 */
	public function __construct($tcpdf) {
		$this->_tcpdf = $tcpdf;
	}

	/**
	 * @return \TCPDF
	 */
	public function getTcpdf() {
		return $this->_tcpdf;
	}

	/**
	 * @param $tcpdf \TCPDF
	 * @return void
	 */
	public function setTcpdf($tcpdf) {
		$this->_tcpdf = is_object($tcpdf) ? $tcpdf : $this->_tcpdf;
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
		return call_user_func_array(array($this->getTcpdf(), static::$method), $this->getArguments());
	}

	/**
	 * @param string $name
	 * @param mixed $value
	 */
	public function __set($name, $value) {
		$this->_arguments[$name] = $value;
	}

	/**
	 * @param string $name
	 */
	public function __unset($name) {
		unset($this->_arguments[$name]);
	}

	/**
	 * @param string $name
	 * @return bool
	 */
	public function __isset($name) {
		return isset($this->_arguments[$name]);
	}

	/**
	 * @param string $name
	 * @return mixed
	 */
	public function __get($name) {
		return isset($this->_arguments[$name]) ? $this->_arguments[$name] : null;
	}

	/**
	 * @param string $name
	 * @param array $arguments
	 * @return $this|mixed
	 * @throws \org\majkel\tcpdfwarper\MissingMethodException
	 */
	public function __call($name, $arguments) {
		$prefix = substr($name, 0, 3);
		$suffix = strtolower(substr($name, 3));
		if ($prefix === 'set') {
			$this->$suffix = count($arguments) > 0 ? $arguments[0] : null;
			return $this;
		}
		else if ($prefix === 'get') {
			return $this->$suffix;
		}
		else {
			throw new MissingMethodException($name, $arguments);
		}
	}

	/**
	 * @return array
	 */
	protected function getArguments() {
		return array_merge(static::$defaultArguments, $this->_arguments);
	}

	/**
	 * @param string $argName
	 * @throws \org\majkel\tcpdfwarper\MissingArgException
	 */
	protected function assertArgExists($argName) {
		if (!isset($this->_arguments[$argName])) {
			throw new MissingArgException($argName);
		}
	}
}
