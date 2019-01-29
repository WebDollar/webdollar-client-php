<?php

namespace WebDollar\Client\Methods;

/**
 * Class GetBalance
 * @package WebDollar\Client\Methods
 */
class GetBalance extends AbstractMethod
{
    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->getRawResult();
    }
}
