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
 * Class WriteOpTest
 * @package org\majkel\tcpdfwarper
 * @coversDefaultClass \org\majkel\tcpdfwarper\Utils
 */
class UtilsTest extends AbstractTestCase {

	/**
	 * @return array
	 */
	public function dataGetKeyAsArray() {
		return [
			[[], 'missing key', []],
			[['k' => 'v'], 'k', []],
			[['k' => []], 'k', []],
			[['k' => [1, 2, 3]], 'k', [1, 2, 3]],
			[null, 'k', []],
			[[], null, []],
			[null, null, []],
		];
	}

	/**
	 * @param $array
	 * @param $key
	 * @param $excepted
	 * @dataProvider dataGetKeyAsArray
	 * @covers ::getKeyAsArray
	 */
	public function testGetKeyAsArray($array, $key, $excepted) {
		self::assertSame($excepted, Utils::getKeyAsArray($array, $key));
	}
}
