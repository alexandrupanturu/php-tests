<?php


namespace PHPTests\Tests;

/**
 * Class TestIterator
 * @package PHPTests\Tests
 */
class TestIterator extends AbstractTest
{
    /** @var  array|\ArrayIterator */
    protected $data;

    /**
     * @inheritDoc
     */
    public function getName()
    {
        return "#Initialized Iterator over " . self::ARRAY_SIZE . " size array";
    }

    protected function prepare()
    {

        for ($i = 0; $i < self::ARRAY_SIZE; $i++) {
            $this->data[$i] = $i;
        }
        $this->data = new \ArrayIterator($this->data);
        $this->data->rewind();
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
