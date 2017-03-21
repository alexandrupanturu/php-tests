<?php

namespace PHPTests;

use PHPTests\System\LinuxSystemInfo;
use PHPTests\Tests\AbstractTest;
use PHPTests\Tests\TestInterface;

class TestRunner
{
    /**
     * TestRunner constructor.
     */
    public function __construct()
    {
        $system = new LinuxSystemInfo();

        echo "################# System Information #################" . AbstractTest::getLineEnd();

        echo "System : " . $system->getOperatingSystem() . AbstractTest::getLineEnd();
        echo "System memory: " . $system->getAvailableMemory() / 1024 . " GB" . AbstractTest::getLineEnd();
        echo "System cores: " . $system->getCoreNumber() . AbstractTest::getLineEnd();

        echo "############### End System Information ###############" . AbstractTest::getLineEnd();
        echo AbstractTest::getLineEnd();

    }

    /**
     * @param $class
     *
     * @throws \Exception
     */
    public function run($class)
    {
        if (!class_exists($class)) {
            throw  new \Exception("Test not found!");
        }

        /** @var TestInterface $obj */
        $obj = new $class;

        if (!$obj instanceof TestInterface) {
            throw  new \Exception("This is not a performance test!");
        }

        echo "Running {$class} -> {$obj->getName()}" . AbstractTest::getLineEnd();

        $obj->run();


        /** clear memory */
        $obj = null;
        gc_collect_cycles();
    }
}
