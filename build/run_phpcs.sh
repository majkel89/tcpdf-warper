#!/bin/bash

DIR=$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )
cd "$DIR/.."

vendor/bin/phpcs -p \
	--standard=style/ruleset.xml \
	-d memory_limit=256M \
	--ignore=tests/org/majkel/tcpdfwarper/generator/FuncMock.php \
	src/ \
	tests/org/ \
	examples
