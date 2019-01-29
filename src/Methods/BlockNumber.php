<?php

namespace WebDollar\Client\Methods;

/**
 * Class BlockNumber
 * @package WebDollar\Client\Methods
 */
class BlockNumber extends AbstractMethod
{
    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->getRawResult();
    }
}
