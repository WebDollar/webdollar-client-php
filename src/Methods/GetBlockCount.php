<?php

namespace WebDollar\Client\Methods;

/**
 * Class GetBlockCount
 * @package WebDollar\Client\Methods
 */
class GetBlockCount extends AbstractMethod
{
    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->getRawResult();
    }
}
