<?php
/**
 * Created by PhpStorm.
 * User: Michał (majkel) Kowalik <maf.michal@gmail.com>
 * Date: 12/29/2014
 * Time: 18:57
 */

namespace org\majkel\tcpdfwarper;

/**
 * Class MissingArgException
 * @package org\majkel\tcpdfwarper
 */
class MissingArgException extends AbstractException {

	const MESSAGE = 'Argument `%s` is missing';

	/**
	 * @var string
	 */
	protected $argumentName;

	/**
	 * @param string $argumentName
	 * @param int $code
	 * @param \Exception $previous
	 */
	public function __construct($argumentName, $code = 0, $previous = null) {
		$this->argumentName = $argumentName;
		parent::__construct(sprintf(self::MESSAGE, $argumentName), $code, $previous);
	}

	/**
	 * @return string
	 */
	public function getArgumentName() {
		return $this->argumentName;
	}

}
