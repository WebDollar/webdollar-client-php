<?php

namespace WebDollar\Client\Methods;

/**
 * Class Syncing
 * @package WebDollar\Client\Methods
 */
class Syncing extends AbstractMethod
{
    /**
     * @return bool
     */
    public function isSynchronized()
    {
        return $this->_getKeyFromResult('isSynchronized');
    }

    /**
     * @return int
     */
    public function currentBlock()
    {
        return $this->_getKeyFromResult('currentBlock');
    }

    /**
     * @return float
     */
    public function secondsBehind()
    {
        return $this->_getKeyFromResult('secondsBehind');
    }
}
