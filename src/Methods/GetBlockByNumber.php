<?php

namespace WebDollar\Client\Methods;

use WebDollar\Client\Model\Block;

/**
 * Class GetBlockByNumber
 * @package WebDollar\Client\Methods
 */
class GetBlockByNumber extends AbstractMethod
{
    /**
     * @return Block|null
     */
    public function getBlock()
    {
        if ($this->getRawResult() === NULL)
        {
            return NULL;
        }

        return Block::constructFrom($this->getRawResult());
    }
}
