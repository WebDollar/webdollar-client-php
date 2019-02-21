<?php

namespace WebDollar\Client\Model;

/**
 * Class TransactionFrom
 * @package WebDollar\Client\Model
 */
class TransactionFrom extends AbstractModel
{
    /**
     * @var string
     */
    private $trx_from_address;

    /**
     * @var string
     */
    private $trx_from_pub_key;

    /**
     * @var string
     */
    private $trx_from_signature;

    /**
     * @var float
     */
    private $trx_from_amount;

    /**
     * @var int
     */
    private $trx_from_amount_raw;

    /**
     * @var Account
     */
    private $_oAccount;

    /**
     * @return Account
     */
    public function getAccount()
    {
        if ($this->_oAccount !== NULL)
        {
            return $this->_oAccount;
        }

        return $this->_oAccount = Account::constructFrom(['address' => $this->trx_from_address]);
    }

    /**
     * @return string
     */
    public function getPubKey()
    {
        return $this->trx_from_pub_key;
    }

    /**
     * @return string
     */
    public function getSignature()
    {
        return $this->trx_from_signature;
    }

    /**
     * @return float
     */
    public function getAmount()
    {
        return $this->trx_from_amount;
    }

    /**
     * @return int
     */
    public function getAmountRaw()
    {
        return $this->trx_from_amount_raw;
    }
}
