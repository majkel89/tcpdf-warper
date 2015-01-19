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
require_once __DIR__.'/ClassDefinitionMock.php';
require_once __DIR__ . '/ClassDefinitionSampleClass.php';

use org\majkel\tcpdfwarper\AbstractTestCase;

/**
 * Class ClassDefinitionTest
 * @package org\majkel\tcpdfwarper\generator
 * @coversDefaultClass \org\majkel\tcpdfwarper\generator\ClassDefinition
 */
class ClassDefinitionTest extends AbstractTestCase
{
	const CLS = '\org\majkel\tcpdfwarper\generator\ClassDefinitionMock';
	const OCLS = '\org\majkel\tcpdfwarper\generator\ClassDefinition';
	const PCLS = '\org\majkel\tcpdfwarper\generator\ClassDefinitionSampleClass';

	/**
	 * @return ClassDefinition
	 */
	protected function getObj() {
		return $this->mock(self::CLS)->new();
	}

	/**
	 * @param ClassDefinition $obj
	 * @return ClassDefinition
	 */
	protected function ref($obj = null) {
		return $this->reflect($obj ? $obj : self::CLS);
	}

	/**
	 * @covers ::fromConfigItem
	 */
	public function testFromConfigItem() {

		$config = new ConfigItem();
		$config->name = 'name';
		$config->className = 'className';
		$config->method = 'Write';
		$config->metaMethods = array();
		$config->additionalDoc = array(
			'x' => '1',
		);

		$obj = $this->mock(self::CLS)
				->parse([], self::once())
				->generateMetaMethods([$config->metaMethods], self::once())
				->new();

		ClassDefinitionMock::$MOCK = $obj;

		$class = $this->ref()
				->fromConfigItem($config);

		self::assertSame($config->name, $class->name);
		self::assertSame($config->className, $class->className);
		self::assertSame($config->method, $class->method);
	}

	/**
	 * @covers ::getClassDoc
	 */
	public function testGetClassDoc() {
		$obj = $this->getObj();
		$this->ref($obj)->doc = array('1', '2', '3');
		$result = $obj->getClassDoc('x');
		self::assertSame('1x2x3', $result);
	}

	/**
	 * @covers ::findParam
	 */
	public function testFindParam() {
		$comment = <<<EOS
 * @param \$x (z) dds fds fds
 * @param \$xxx (type) some description is here
 * @param \$x (z) dds fds fds
EOS;
		$result = $this->reflect(self::CLS)->findParam($comment, 'xxx');
		self::assertSame('type', $result[0]);
	}

	/**
	 * @expectedException \org\majkel\tcpdfwarper\generator\GeneratorException
	 * @covers ::findParam
	 */
	public function testFindParamInvalid() {
		$comment = <<<EOS
 INVALID
EOS;
		$this->reflect(self::CLS)->findParam($comment, 'xxx');
	}

	/**
	 * @covers ::setupReturn
	 */
	public function testSetupReturn() {
		$comment = <<<EOS
 * @return type desc
EOS;
		$obj = $this->getObj();
		$this->reflect($obj)->setupReturn($comment);
		self::assertSame('type', $obj->returnType);
		self::assertSame('desc', $obj->returnDoc);
	}

	/**
	 * @covers ::setupReturn
	 */
	public function testSetupReturnFail() {
		$comment = <<<EOS
 * @param type desc
EOS;
		$obj = $this->getObj();
		$this->reflect($obj)->setupReturn($comment);
		self::assertSame('void', $obj->returnType);
		self::assertSame('', $obj->returnDoc);
	}

	/**
	 * @covers ::cleanComment
	 */
	public function testCleanComment() {
		$comment = <<<EOS
 *
 * @param type    desc
 * fdgfdgfd
 *
EOS;
		$actual = $this->reflect(self::CLS)->cleanComment($comment);
		self::assertSame('* @param type desc fdgfdgfd', $actual);
	}

	/**
	 * @covers ::cleanClassDoc
	 */
	public function testCleanClassDoc() {
		$comment = <<<EOS
 * 1
 * 2
 *
EOS;
		$actual = $this->reflect(self::CLS)->cleanClassDoc($comment);
		self::assertSame(array(' * 1', '2', ''), $actual);
	}

	/**
	 * @covers ::extractFromOffsetToTag
	 */
	public function testExtractFromOffsetToTag() {
		$comment = <<<EOS
 * @param x
 * line 1
 * some text
 * @param z
EOS;
		$excepted = <<<EOS

 * line 1
 * some text
 *
EOS;
		$actual = $this->reflect(self::CLS)->extractFromOffsetToTag($comment, 11);
		self::assertSame($excepted, $actual);
	}

	/**
	 * @covers ::extractFromOffsetToTag
	 */
	public function testExtractFromOffsetToTagNotFound() {
		$comment = <<<EOS
 * @param x
 * line 1
 * some text
 */
EOS;
		$excepted = <<<EOS

 * line 1
 * some text
 */
EOS;
		$actual = $this->reflect(self::CLS)->extractFromOffsetToTag($comment, 11);
		self::assertSame($excepted, $actual);
	}

	/**
	 * @return array
	 */
	public function snakeToCamelData() {
		return array(
				array('sname_to_cammel', 'snameToCammel'),
				array('_', ''),
		);
	}

	/**
	 * @param $input
	 * @param $output
	 * @dataProvider snakeToCamelData
	 * @covers ::snakeToCamel
	 */
	public function testSnakeToCamel($input, $output) {
		$actual = $this->ref()->snakeToCamel($input);
		self::assertSame($output, $actual);
	}

	/**
	 * @covers ::newSelf
	 */
	public function testNewSelf() {
		self::assertTrue($this->reflect(self::OCLS)->newSelf() instanceof ClassDefinition);
	}

	/**
	 * @expectedException \org\majkel\tcpdfwarper\generator\GeneratorException
	 * @covers ::generateMetaMethods
	 */
	public function testGenerateMetaMethodsInvalidArg() {
		$obj = $this->getObj();
		$methodConfig = new ConfigMetaMethod();
		$methodConfig->args = array('invalid');
		$this->reflect($obj)->generateMetaMethods(array($methodConfig));
	}

	/**
	 * @covers ::generateMetaMethods
	 */
	public function testGenerateMetaMethods() {
		$obj = $this->getObj();

		$xArg = new Argument();

		$this->reflect($obj)->defaultParameters = array(
				'x' => $xArg,
				'y' => new Argument(),
		);

		$methodConfig = new ConfigMetaMethod();
		$methodConfig->doc = 'DOC';
		$methodConfig->name = 'NAME';
		$methodConfig->args = array('x');

		$this->reflect($obj)->generateMetaMethods(array($methodConfig));

		$metaMethods = $this->reflect($obj)->metaMethods;

		self::assertCount(1, $metaMethods);
		self::assertSame('DOC', $metaMethods[0]->doc);
		self::assertSame('NAME', $metaMethods[0]->name);
		self::assertSame(array('x' => $xArg), $metaMethods[0]->arguments);
	}

	/**
	 * @covers ::parse
	 */
	public function testParse() {
		$obj = $this->getObj();
		$obj->method = 'test';
		$obj->className = self::PCLS;
		$this->reflect($obj)->parse(array(
				'x' => " additional\ndoc",
		), self::PCLS);

		$defParams = $obj->defaultParameters;

		self::assertCount(5, $obj->defaultParameters);

		self::assertSame('X additional doc', $defParams['x']->doc);
		self::assertSame('Y', $defParams['y']->doc);
		self::assertSame('Z', $defParams['z']->doc);
		self::assertSame('W', $defParams['w']->doc);
		self::assertSame('ARR', $defParams['arr']->doc);

		self::assertSame(true, $defParams['x']->required);
		self::assertSame(true, $defParams['y']->required);
		self::assertSame(false, $defParams['z']->required);
		self::assertSame(false, $defParams['w']->required);
		self::assertSame(false, $defParams['arr']->required);

		self::assertSame('x', $defParams['x']->name);
		self::assertSame('y', $defParams['y']->name);
		self::assertSame('z', $defParams['z']->name);
		self::assertSame('w', $defParams['w']->name);
		self::assertSame('arr', $defParams['arr']->name);

		self::assertSame('int', $defParams['x']->type);
		self::assertSame('float', $defParams['y']->type);
		self::assertSame('string', $defParams['z']->type);
		self::assertSame('integer', $defParams['w']->type);
		self::assertSame('array', $defParams['arr']->type);

		self::assertSame('null', $defParams['x']->value);
		self::assertSame('null', $defParams['y']->value);
		self::assertSame('self::TEST', $defParams['z']->value);
		self::assertSame('1', $defParams['w']->value);
		self::assertSame('array()', $defParams['arr']->value);

		self::assertSame(array(
				'x' => $defParams['x'],
				'y' => $defParams['y'],
		), $obj->requiredArguments);

		self::assertSame('string', $obj->returnType);
		self::assertSame("t\n\t */", $obj->returnDoc);
	}
}
