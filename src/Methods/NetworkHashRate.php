<?php

namespace WebDollar\Client\Methods;

/**
 * Class NetworkHashRate
 * @package WebDollar\Client\Methods
 */
class NetworkHashRate extends AbstractMethod
{
    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->getRawResult();
    }
}
