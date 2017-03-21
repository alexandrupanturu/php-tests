<?php


namespace PHPTests\Tests;

use PHPTests\ArrayCollection\ArrayCollection;

class TestForObjects extends AbstractTest
{
    protected $data;

    /**
     * @inheritDoc
     */
    public function getName()
    {
        return "#For iteration over " . self::ARRAY_SIZE . " objects";
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
        for ($i = 0; $i < count($this->data); $i++) {
            $x++;
        }
    }
}
