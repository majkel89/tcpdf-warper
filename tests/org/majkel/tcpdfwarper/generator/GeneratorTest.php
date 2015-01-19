<?php
/**
 * Created by PhpStorm.
 * Package: org\majkel\tcpdfwarper
 * User: Michał (majkel) Kowalik <maf.michal@gmail.com>
 * Date: 12/28/2014
 * Time: 22:36
 */

namespace org\majkel\tcpdfwarper\generator;

require_once __DIR__.'/../AbstractTestCase.php';
require_once __DIR__.'/FuncMock.php';

use org\majkel\tcpdfwarper\AbstractTestCase;

/**
 * Class GeneratorTest
 * @package org\majkel\tcpdfwarper\generator
 * @coversDefaultClass \org\majkel\tcpdfwarper\generator\Generator
 */
class GeneratorTest extends AbstractTestCase {

	public function setUp() {
		FuncMock::reset();
	}

	/**
	 * @covers ::__construct
	 */
	public function testConstructor() {
		FuncMock::$MOCK_TIME = true;
		FuncMock::$TIME = 1421619142;
		$obj = new Generator(array(
				'configFile' => 'configFile',
				'classTemplateFile' => 'classTemplateFile',
				'traitTemplateFile' => 'traitTemplateFile',
		));
		$OBJ = $this->reflect($obj);
		self::assertSame('configFile', $OBJ->configFile);
		self::assertSame('classTemplateFile', $OBJ->classTemplateFile);
		self::assertSame('traitTemplateFile', $OBJ->traitTemplateFile);
		self::assertSame(date('Y-m-d', FuncMock::$TIME), $OBJ->date);
		self::assertSame(date('H:i:s', FuncMock::$TIME), $OBJ->time);
	}

	/**
	 * @expectedException \org\majkel\tcpdfwarper\generator\GeneratorException
	 * @covers ::getConfig
	 */
	public function testGetConfigInvalidFile() {
		FuncMock::$MOCK_FILE_EXISTS = true;
		$obj = new Generator(array(
				'configFile' => INVALID_PATH,
				'classTemplateFile' => 'classTemplateFile',
				'traitTemplateFile' => 'traitTemplateFile',
		));
		$this->reflect($obj)->getConfig();
	}

	/**
	 * @expectedException \org\majkel\tcpdfwarper\generator\GeneratorException
	 * @covers ::getConfig
	 */
	public function testGetConfigInvalid() {
		FuncMock::$MOCK_FILE_EXISTS = true;
		$obj = new Generator(array(
				'configFile' => __DIR__.'/data/config.invalid.php',
				'classTemplateFile' => 'classTemplateFile',
				'traitTemplateFile' => 'traitTemplateFile',
		));
		$this->reflect($obj)->getConfig();
	}

	/**
	 * @covers ::getConfig
	 */
	public function testGetConfig() {
		FuncMock::$MOCK_FILE_EXISTS = true;
		$obj = new Generator(array(
				'configFile' => __DIR__.'/data/config.test.php',
				'classTemplateFile' => 'classTemplateFile',
				'traitTemplateFile' => 'traitTemplateFile',
		));
		$config = $this->reflect($obj)->getConfig();
		self::assertCount(3, $config);
	}

	/**
	 * @covers ::removeTrailingSpaces
	 */
	public function testRemoveTrailingSpaces() {
		$obj = $this->reflect('\org\majkel\tcpdfwarper\generator\Generator');

		$sample = "line 1\nline 2  \nline3\t";

		$out = $obj->removeTrailingSpaces($sample);

		self::assertSame("line 1\nline 2\nline3", $out);
	}

	/**
	 * @covers ::generateClass
	 */
	public function testGenerateClass() {
		$obj = new Generator(array(
				'configFile' => INVALID_PATH,
				'classTemplateFile' => __DIR__.'/data/class.template.php',
				'traitTemplateFile' => INVALID_PATH,
		));
		$OBJ = $this->reflect($obj);
		$class = new ClassDefinition();
		$class->method = 'METHOD';
		$result = $OBJ->generateClass($class);
		self::assertSame("<?php\nMETHOD\n", $result);
	}

	/**
	 * @covers ::generateTrait
	 */
	public function testGenerateTrait() {
		$obj = new Generator(array(
				'configFile' => INVALID_PATH,
				'classTemplateFile' => INVALID_PATH,
				'traitTemplateFile' => __DIR__.'/data/trait.template.php',
		));
		$OBJ = $this->reflect($obj);
		$class = new ClassDefinition();
		$class->method = 'METHOD';
		$result = $OBJ->generateTrait(array($class));
		self::assertSame("<?php\nMETHOD\n", $result);
	}

	/**
	 * @covers ::generate
	 * @expectedException \org\majkel\tcpdfwarper\generator\GeneratorException
	 */
	public function testGenerateInvalidDir() {
		$obj = new Generator(array(
				'configFile' => INVALID_PATH,
				'classTemplateFile' => INVALID_PATH,
				'traitTemplateFile' => INVALID_PATH,
		));
		$obj->generate(INVALID_PATH);
	}

	/**
	 * @covers ::generate
	 */
	public function testGenerate() {
		FuncMock::$MOCK_FILE_PUT_CONTENTS = true;
		$obj = new Generator(array(
				'configFile' => INVALID_PATH,
				'classTemplateFile' => INVALID_PATH,
				'traitTemplateFile' => INVALID_PATH,
		));
		$obj = $this->getMockBuilder('\org\majkel\tcpdfwarper\generator\Generator')
				->disableOriginalConstructor()
				->setMethods(array('getConfig', 'generateClass', 'generateTrait'))
				->getMock();

		$configItem = new ConfigItem();
		$configItem->method = 'Write';
		$configItem->className = 'class_name';
		$configItem->metaMethods = array();

		$classDef = ClassDefinition::fromConfigItem($configItem);

		$obj->expects($this->once())
				->method('getConfig')
				->willReturn(array($configItem));

		$obj->expects($this->once())
				->method('generateClass')
				->with(self::equalTo($classDef))
				->willReturn('CLASS');

		$obj->expects($this->once())
				->method('generateTrait')
				->with(self::equalTo(array($classDef)))
				->willReturn('TRAIT');

		$obj->generate(__DIR__);
	}
}
