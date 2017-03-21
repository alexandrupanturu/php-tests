<?php

namespace PHPTests\Tests;

use PHPTests\ArrayCollection\ArrayCollection;

class TestIteratorObjects extends AbstractTest
{
    protected $data;

    /**
     * @inheritDoc
     */
    public function getName()
    {
        return "#Iterator iteration over " . self::ARRAY_SIZE . " objects";
    }

    protected function prepare()
    {
        for ($i = 0; $i < self::ARRAY_SIZE; $i++) {
            $this->data[$i] = new ArrayCollection();
        }

        $this->data = new \ArrayIterator($this->data);
    }

    /**
     * @inheritDoc
     */
    public function test()
    {
        $x = 0;
        while ($this->data->valid()) {
            $x++;
            $this->data->next();
        }
    }
}
