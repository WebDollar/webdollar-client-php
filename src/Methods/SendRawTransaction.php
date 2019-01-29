<?php

namespace WebDollar\Client\Methods;

/**
 * Class SendRawTransaction
 * @package WebDollar\Client\Methods
 */
class SendRawTransaction extends AbstractMethod
{
    /**
     * @return string
     */
    public function getTransactionHash()
    {
        return $this->getRawResult();
    }
}
