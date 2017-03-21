<?php


namespace PHPTests\Tests;

use PHPTests\ArrayCollection\ArrayCollection;

class TestArrayCollection extends AbstractTest
{
    protected $data;

    /**
     * @inheritDoc
     */
    public function getName()
    {
        return "#Iterator iteration over ArrayCollection of " . self::ARRAY_SIZE . " objects";
    }

    protected function prepare()
    {
        $this->data = new ArrayCollection();
        for ($i = 0; $i < self::ARRAY_SIZE; $i++) {
            $this->data->add($i);
        }
    }

    /**
     * @inheritDoc
     */
    public function test()
    {
        $iterator = $this->data->getIterator();
        $x = 0;
        while ($iterator->valid()) {
            $x++;
            $iterator->next();
        }
    }
}
