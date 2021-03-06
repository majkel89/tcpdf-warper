<?php
/**
 * Created by PhpStorm.
 * Package: org\majkel\tcpdfwarper
 * User: Michał (majkel) Kowalik <maf.michal@gmail.com>
 * Date: 12/28/2014
 * Time: 18:17
 */

namespace org\majkel\tcpdfwarper;

use Xpmock\TestCaseTrait;

/**
 * Class AbstractTestCase
 * @package org\majkel\tcpdfwarper
 * @coversDefaultClass \org\majkel\tcpdfwarper\AbstractOp
 */
class AbstractTestCase extends \PHPUnit_Framework_TestCase {

	use TestCaseTrait;

	/**
	 * @var string
	 */
	protected $tcpdfClassName;

	const DEFAULT_TCPDF = '\TCPDF';

	const ENV_PACKAGE = 'TCPDF_PACKAGE';

	protected static $packageMapping = array(
			'tecnickcom/tcpdf' => self::DEFAULT_TCPDF,
			'onigoetz/fpdi_tcpdf' => '\fpdi\FPDI',
			'dummy' => '\org\majkel\tcpdfwarper\DummyTcpdf',
	);

	/**
	 * @return string
	 * @throws \Exception
	 */
	public function getTcpdfClass() {
		if (is_null($this->tcpdfClassName)) {
			$package = strtolower(trim(getenv(self::ENV_PACKAGE)));
			if ($package) {
				if (isset(self::$packageMapping[$package])) {
					$this->tcpdfClassName = self::$packageMapping[$package];
				}
				else {
					throw new \Exception("Unknown TCPDF package `$package`");
				}
			}
			else {
				$this->tcpdfClassName = self::DEFAULT_TCPDF;
			}
		}
		return $this->tcpdfClassName;
	}

	/**
	 * @return \PHPUnit_Framework_MockObject_MockObject
	 */
	public function getTcpdfMock() {
		return $this->getMockBuilder($this->getTcpdfClass())
				->disableOriginalConstructor()
				->getMock();
	}

	/**
	 * For strict mode marks test as success
	 */
	protected function success() {
		self::assertTrue(true);
	}
}
