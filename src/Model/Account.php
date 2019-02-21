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

    /**
     * @var string
     */
    private $publicKey;

    /**
     * @var string
     */
    private $privateKey;

    /**
     * @var string
     */
    private $version;

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

    public function getPublicKey()
    {
        return $this->publicKey;
    }

    public function getPrivateKey()
    {
        return $this->privateKey;
    }

    public function getVersion()
    {
        return $this->version;
    }
}
