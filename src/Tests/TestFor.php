<?php

namespace PHPTests\Tests;

class TestFor extends AbstractTest
{
    protected $arrayData;

    public function getName()
    {
        return "#For with " . self::ARRAY_SIZE . " size array";
    }

    public function prepare()
    {
        for ($i = 0; $i < self::ARRAY_SIZE; $i++) {
            $this->arrayData[$i] = $i;
        }
    }

    public function test()
    {
        $x = 0;
        for ($i = 0; $i < count($this->arrayData); $i++) {
            $x++;
        }
    }
}
