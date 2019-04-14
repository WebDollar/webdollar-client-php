<?php

namespace WebDollar\Client\Methods;

/**
 * Class SendAdvancedTransaction
 * @package WebDollar\Client\Methods
 */
class SendAdvancedTransaction extends AbstractMethod
{
    /**
     * @return string
     */
    public function getTransactionHash()
    {
        return $this->getRawResult();
    }
}
