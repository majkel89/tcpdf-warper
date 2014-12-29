<?php
/**
 * Created by PhpStorm.
 * User: Michał (majkel) Kowalik <maf.michal@gmail.com>
 * Date: 12/29/2014
 * Time: 18:57
 */

namespace org\majkel\tcpdfwarper;

/**
 * Class MissingMethodException
 * @package org\majkel\tcpdfwarper
 */
class MissingMethodException extends AbstractException {

	const MESSAGE = 'Call to undefined method `%s`';

	/**
	 * @var string
	 */
	protected $method;

	/**
	 * @var array
	 */
	protected $arguments;

	/**
	 * @param string $methodName
	 * @param array $arguments
	 * @param int $code
	 * @param \Exception $previous
	 */
	public function __construct($methodName, $arguments, $code = 0, $previous = null) {
		$this->method = $methodName;
		$this->arguments = $arguments;
		parent::__construct(sprintf(self::MESSAGE, $methodName), $code, $previous);
	}

	/**
	 * @return string
	 */
	public function getMethodName() {
		return $this->method;
	}

	/**
	 * @return array
	 */
	public function getArguments() {
		return $this->arguments;
	}

}
