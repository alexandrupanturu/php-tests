<?php

namespace PHPTests\Tests;

/**
 * Interface TestInterface
 * @package Tests
 */
interface TestInterface
{
    /**
     * @return mixed
     */
    public function run();

    /**
     * @return mixed
     */
    public function getName();
}
