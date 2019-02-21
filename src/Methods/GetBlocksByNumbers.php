<?php

namespace WebDollar\Client\Methods;

use WebDollar\Client\Model\Block;

/**
 * Class GetBlocksByNumbers
 * @package WebDollar\Client\Methods
 */
class GetBlocksByNumbers extends AbstractMethod
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
