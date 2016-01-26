<?php
/**
 * @var $this \org\majkel\tcpdfwarper\generator\Generator
 * @var $class \org\majkel\tcpdfwarper\generator\ClassDefinition
 */
echo '<?php';
?>

/**
 * Created by Generator.
 * Package: org\majkel\tcpdfwarper
 * User: Michał (majkel) Kowalik <maf.michal@gmail.com>
 * Date: <?= $this->date ?>

 * Time: <?= $this->time ?>

 */

namespace org\majkel\tcpdfwarper;

/**
 * Class <?= $class->className ?>

 * @package org\majkel\tcpdfwarper
 * <?= $class->getClassDoc("\n * ") ?>

<?php foreach ($class->defaultParameters as $A) : ?>
 * @property <?= $A->type ?> $<?= $A->name ?> <?= $A->doc ?>

<?php endforeach ?>
 *
<?php foreach ($class->defaultParameters as $A) : ?>
 * @method <?= $class->className ?> set<?= ucfirst($A->name) ?>(<?=
	   $A->type ?> $<?= $A->name ?>) <?= $A->doc ?>

<?php endforeach ?>
 *
<?php foreach ($class->defaultParameters as $A) : ?>
 * @method <?= $A->type ?> get<?= ucfirst($A->name) ?>() <?= $A->doc ?>

<?php endforeach ?>
 *
 * @method <?= $class->returnType ?> write() <?= $class->returnDoc ?>

 * @method <?= $class->returnType ?> render() <?= $class->returnDoc ?>

 */
class <?= $class->className ?> extends AbstractOp {

	/**
	 * @codeCoverageIgnore
	 * @return array
	 */
	protected function getDefaultArguments() {
		return array(
<?php foreach ($class->defaultParameters as $A) : ?>
			'<?= $A->name ?>' => <?= $A->value ?>,
<?php endforeach ?>
		);
	}

	/**
	 * @codeCoverageIgnore
	 * @return string
	 */
	protected function getMethod() {
		return '<?= $class->method ?>';
	}

	/**
	 * @return <?= $class->returnType ?> <?= $class->returnDoc ?>

	 */
	public function put() {
<?php foreach ($class->requiredArguments as $P) : ?>
		$this->assertArgExists('<?= $P->name ?>');
<?php endforeach ?>
		<?php
		if ($class->returnType !== 'void') {
			echo 'return ';
		} ?>parent::put();
	}

<?php foreach ($class->metaMethods as $M) : ?>
	/**
	 * <?= $M->doc ?>

<?php foreach ($M->arguments as $arg) : ?>
	 * @param <?= $arg->type ?> $<?= $arg->name ?> <?= $arg->doc ?>

<?php endforeach ?>
	 * @return <?= $class->className ?>

	 */
	public function set<?= ucfirst($M->name) ?>(<?php
	$arguments = array();
	foreach ($M->arguments as $arg) {
		$arguments[] = "\${$arg->name}";
	}
	echo implode(', ', $arguments);
?>) {
		return $this<?php
		foreach ($M->arguments as $arg) {
			?>->set<?= ucfirst($arg->name) ?>($<?= $arg->name ?>)<?php
		} ?>;
	}

<?php endforeach ?>
}
