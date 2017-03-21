<?php

require __DIR__ . '/vendor/autoload.php';
ini_set('memory_limit', '7G');

$runner = new \PHPTests\TestRunner();

$runner->run(\PHPTests\Tests\TestFor::class);
$runner->run(\PHPTests\Tests\TestForeach::class);
$runner->run(\PHPTests\Tests\TestIterator::class);

$runner->run(\PHPTests\Tests\TestForObjects::class);
$runner->run(\PHPTests\Tests\TestForeachObjects::class);
$runner->run(\PHPTests\Tests\TestIteratorObjects::class);

$runner->run(\PHPTests\Tests\TestArrayCollection::class);


