<?php

namespace WebDollar\Client\Model;

/**
 * Class Account
 * @package WebDollar\Client\Model
 */
class Account extends AbstractModel
{
    /**
     * @var string
     */
    private $address;

    /**
     * @var float
     */
    private $balance;

    /**
     * @var integer
     */
    private $balance_raw;

    public function getAddress()
    {
        return $this->address;
    }

    public function getBalance()
    {
        return $this->balance;
    }

    public function getBalanceRaw()
    {
        return $this->balance_raw;
    }
}
