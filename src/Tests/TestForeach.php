<?php

namespace PHPTests\Tests;

class TestForeach extends AbstractTest
{
    protected $arrayData;

    public function getName()
    {
        return "#Foreach with " . self::ARRAY_SIZE . " size array";
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
        foreach ($this->arrayData as $key => $value) {
            $x = $key;
        }
    }

}
