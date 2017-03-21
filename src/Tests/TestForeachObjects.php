<?php


namespace PHPTests\Tests;

use PHPTests\ArrayCollection\ArrayCollection;

class TestForeachObjects extends AbstractTest
{
    protected $data;

    /**
     * @inheritDoc
     */
    public function getName()
    {
        return "#Foreach iteration over " . self::ARRAY_SIZE . " objects";
    }

    protected function prepare()
    {
        for ($i = 0; $i < self::ARRAY_SIZE; $i++) {
            $this->data[$i] = new ArrayCollection();
        }
    }

    /**
     * @inheritDoc
     */
    public function test()
    {
        $x = 0;
        foreach ($this->data as $k => $v) {
            $x++;
        }
    }
}
