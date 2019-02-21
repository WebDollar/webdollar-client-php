<?php

namespace WebDollar\Client\Methods;

use WebDollar\Client\Model\Block;

/**
 * Class GetBlockByHash
 * @package WebDollar\Client\Methods
 */
class GetBlockByHash extends AbstractMethod
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
