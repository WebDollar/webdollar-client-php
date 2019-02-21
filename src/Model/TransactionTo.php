<?php

namespace WebDollar\Client\Model;

/**
 * Class TransactionTo
 * @package WebDollar\Client\Model
 */
class TransactionTo extends AbstractModel
{
    /**
     * @var string
     */
    private $trx_to_address;

    /**
     * @var float
     */
    private $trx_to_amount;

    /**
     * @var int
     */
    private $trx_to_amount_raw;

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

        return $this->_oAccount = Account::constructFrom(['address' => $this->trx_to_address]);
    }

    /**
     * @return float
     */
    public function getAmount()
    {
        return $this->trx_to_amount;
    }

    /**
     * @return int
     */
    public function getAmountRaw()
    {
        return $this->trx_to_amount_raw;
    }
}
