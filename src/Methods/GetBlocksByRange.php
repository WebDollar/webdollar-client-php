<?php

namespace WebDollar\Client\Methods;

use WebDollar\Client\Model\Block;

/**
 * Class GetBlocksByRange
 * @package WebDollar\Client\Methods
 */
class GetBlocksByRange extends AbstractMethod
{
    /**
     * @return Block[]
     */
    public function getBlocks()
    {
        $aBlocks = [];

        foreach ($this->getRawResult() as $aBlock)
        {
            $aBlocks[] = Block::constructFrom($aBlock);
        }

        return $aBlocks;
    }
}
