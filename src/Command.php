<?php

namespace WebDollar\Client;

use WebDollar\Client\Contracts\ICommand;

/**
 * Class Command
 * @package WebDollar\Client
 */
class Command implements ICommand
{
    /**
     * @var string
     */
    private $_sName;

    /**
     * @var array
     */
    private $_aArgs = [];

    public function __construct($name, array $args = [])
    {
        $this->_sName = $name;
        $this->_aArgs = $args;
    }

    public function getName()
    {
        return $this->_sName;
    }

    public function hasParam($name)
    {
        return \array_key_exists($name, $this->_aArgs);
    }

    public function getIterator()
    {
        return new \ArrayIterator($this->_aArgs);
    }

    public function & offsetGet($offset)
    {
        if (isset($this->_aArgs[$offset]))
        {
            return $this->_aArgs[$offset];
        }

        $value = NULL;
        return $value;
    }

    public function offsetSet($offset, $value)
    {
        $this->_aArgs[$offset] = $value;
    }

    public function offsetExists($offset)
    {
        return isset($this->_aArgs[$offset]);
    }

    public function offsetUnset($offset)
    {
        unset($this->_aArgs[$offset]);
    }

    public function toArray()
    {
        return $this->_aArgs;
    }

    public function count()
    {
        return \count($this->_aArgs);
    }


}
