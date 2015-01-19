<?php
/**
 * @var $this \org\majkel\tcpdfwarper\generator\Generator
 * @var $classes \org\majkel\tcpdfwarper\generator\ClassDefinition[]
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
 * Class TCPDFWarperTrait
 * @package org\majkel\tcpdfwarper
 */
trait TCPDFWarperTrait {

<?php foreach ($classes as $class) : ?>
	/**<?= $class->getClassDoc("\n\t * ") ?>

	 * @return <?= $class->className ?>

	 */
	public function build<?= ucfirst($class->name) ?>() {
		return new <?= $class->className ?>($this);
	}

<?php endforeach ?>
}
