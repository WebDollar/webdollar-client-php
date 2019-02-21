<?php

namespace WebDollar\Client\Methods;

use WebDollar\Client\Model\Transaction;

/**
 * Class GetTransactionByBlockNumberAndIndex
 * @package WebDollar\Client\Methods
 */
class GetTransactionByBlockNumberAndIndex extends AbstractMethod
{
    /**
     * @return Transaction|null
     */
    public function getTransaction()
    {
        if ($this->getRawResult() === NULL)
        {
            return NULL;
        }

        return Transaction::constructFrom($this->getRawResult());
    }
}
