<?php
/**
 * Created by PhpStorm.
 * User: Michał (majkel) Kowalik <maf.michal@gmail.com>
 * Date: 1/19/2015
 * Time: 18:36
 */

namespace org\majkel\tcpdfwarper\generator;

const INVALID_PATH = 'INVALID';

/**
 * Class FuncMock
 * @package org\majkel\tcpdfwarper\generator
 */
class FuncMock {

	public static $MOCK_TIME = false;
	public static $TIME;
	public static $MOCK_FILE_EXISTS = false;
	public static $MOCK_FILE_PUT_CONTENTS = false;

	public static function reset() {
		FuncMock::$MOCK_TIME = false;
		FuncMock::$MOCK_FILE_EXISTS = false;
		FuncMock::$MOCK_FILE_PUT_CONTENTS = false;
	}
}


/**
 * @return int
 */
function time() {
	if (FuncMock::$MOCK_TIME) {
		return FuncMock::$TIME;
	}
	else {
		return \time();
	}
}

/**
 * @param string $path
 * @return bool
 */
function file_exists($path) {
	if (FuncMock::$MOCK_FILE_EXISTS) {
		return $path !== INVALID_PATH;
	}
	else {
		return \file_exists($path);
	}
}

/**
 * @param string $path
 * @param string $contents
 * @return bool|int
 * @throws \Exception
 */
function file_put_contents($path, $contents) {
	if (FuncMock::$MOCK_FILE_PUT_CONTENTS) {
		if ($path === __DIR__.'/class_name.php' && 'CLASS' === $contents) {
			return true;
		}
		else if ($path === __DIR__.'/TCPDFWarperTrait.php' && 'TRAIT' === $contents) {
			return true;
		}
		else {
			throw new \Exception("Unexpected file_put_contents call `$path` `$contents`");
		}
	}
	else {
		return \file_put_contents($path, $contents);
	}
}
