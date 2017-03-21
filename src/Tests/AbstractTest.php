<?php

namespace PHPTests\Tests;

use PHPTests\System\LinuxSystemInfo;

/**
 * Class AbstractTest
 * @package Tests
 */
abstract class AbstractTest implements TestInterface
{
    const ARRAY_SIZE = 10000;

    protected $initMemory = 0;

    protected $startTime = 0;

    /**
     * @return void
     */
    abstract public function test();

    protected function prepare()
    {
        return;
    }

    public function run()
    {
        $this->initMemory = memory_get_usage(true);
        $this->prepare();


        $this->startTime = microtime(true);

        $this->test();

        echo "Test took {$this->getProcessTime()} seconds and used {$this->getUsedMemory()} Mb" . $this->getLineEnd();

        echo $this->getLineEnd();
        echo $this->getLineEnd();
    }

    /**
     * @return string
     */
    protected function getUsedMemory()
    {
        return (memory_get_usage(true) - $this->initMemory) / 1024 / 1024 . " MB";
    }

    /**
     * @return float
     */
    protected function getProcessTime()
    {
        return round(microtime(true) - $this->startTime, 4);
    }

    public static function isConsole()
    {
        return php_sapi_name() === 'cli';
    }

    public static function getLineEnd()
    {
        return true === self::isConsole() ? PHP_EOL : '<br/>';
    }
}
