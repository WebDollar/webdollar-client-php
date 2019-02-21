<?php

namespace WebDollar\Client\Methods;

/**
 * Class GetBlockTransactionCountByHash
 * @package WebDollar\Client\Methods
 */
class GetBlockTransactionCountByHash extends AbstractMethod
{
    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->getRawResult();
    }
}
