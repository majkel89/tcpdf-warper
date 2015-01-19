<?php
/**
 * Created by PhpStorm.
 * User: Michał (majkel) Kowalik <maf.michal@gmail.com>
 * Date: 1/19/2015
 * Time: 01:06
 */

namespace org\majkel\tcpdfwarper\generator;

class ClassDefinitionMock extends ClassDefinition {

	/** @var ClassDefinition */
	public static $MOCK;

	/**
	 * @return ClassDefinition
	 */
	protected static function newSelf() {
		return static::$MOCK;
	}

}
