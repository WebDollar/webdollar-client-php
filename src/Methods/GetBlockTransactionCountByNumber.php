<?php

namespace WebDollar\Client\Methods;

use Graze\GuzzleHttp\JsonRpc\Message\ResponseInterface;
use WebDollar\Client\Contracts\ICommand;
use WebDollar\Client\Exception\MethodNotFoundException;

/**
 * Class GetBlockTransactionCountByNumber
 * @package WebDollar\Client\Methods
 */
class GetBlockTransactionCountByNumber extends AbstractMethod
{
    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->getRawResult();
    }
}
