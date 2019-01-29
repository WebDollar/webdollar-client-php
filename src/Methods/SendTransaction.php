<?php

namespace WebDollar\Client\Methods;

/**
 * Class SendTransaction
 * @package WebDollar\Client\Methods
 */
class SendTransaction extends AbstractMethod
{
    /**
     * @return string
     */
    public function getTransactionHash()
    {
        return $this->getRawResult();
    }
}
