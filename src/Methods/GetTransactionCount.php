<?php

namespace WebDollar\Client\Methods;

/**
 * Class GetTransactionCount
 * @package WebDollar\Client\Methods
 */
class GetTransactionCount extends AbstractMethod
{
    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->getRawResult();
    }
}
