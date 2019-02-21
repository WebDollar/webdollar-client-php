<?php

namespace WebDollar\Client\Model;

use Carbon\Carbon;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Class Transaction
 * @package WebDollar\Client\Model
 */
class Transaction extends AbstractModel
{
    /**
     * @var string
     */
    private $trx_id;

    /**
     * @var int
     */
    private $version;

    /**
     * @var int
     */
    private $nonce;

    /**
     * @var int
     */
    private $index;

    /**
     * @var int
     */
    private $time_lock;

    /**
     * @var int
     */
    private $from_length;

    /**
     * @var int
     */
    private $to_length;

    /**
     * @var float
     */
    private $amount;

    /**
     * @var int
     */
    private $amount_raw;

    /**
     * @var int
     */
    private $block_id;

    /**
     * @var float
     */
    private $total_amount;

    /**
     * @var int
     */
    private $total_amount_raw;

    /**
     * @var float
     */
    private $fee;

    /**
     * @var int
     */
    private $fee_raw;

    /**
     * @var string
     */
    private $createdAtUTC;

    /**
     * @var
     */
    private $from;

    /**
     * @var array
     */
    private $to;

    /**
     * @var bool
     */
    private $isConfirmed = FALSE;

    /**
     * @var Block
     */
    private $_oBlock;

    /**
     * @var Collection|TransactionFrom[]
     */
    private $_oTransactionsFrom;

    /**
     * @var Collection|TransactionTo[]
     */
    private $_oTransactionsTo;

    public function getBlock()
    {
        return $this->_oBlock;
    }

    public function setBlock(Block $oBlock)
    {
        $this->_oBlock = $oBlock;
    }

    public function getBlockNumber()
    {
        if ($this->getBlock() !== NULL)
        {
            return $this->getBlock()->getNumber();
        }

        return $this->block_id;
    }

    public function getHash()
    {
        return $this->trx_id;
    }

    public function getVersion()
    {
        return $this->version;
    }

    public function getNonce()
    {
        return $this->nonce;
    }

    public function getIndex()
    {
        return $this->index;
    }

    public function getTimeLock()
    {
        return $this->time_lock;
    }

    public function getFromLength()
    {
        return $this->from_length;
    }

    public function getToLength()
    {
        return $this->to_length;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function getAmountRaw()
    {
        return $this->amount_raw;
    }

    public function getTotalAmount()
    {
        return $this->total_amount;
    }

    public function getTotalAmountRaw()
    {
        return $this->total_amount_raw;
    }

    public function getFee()
    {
        return $this->fee;
    }

    public function getFeeRaw()
    {
        return $this->fee_raw;
    }

    public function getCreatedAt()
    {
        if (empty($this->createdAtUTC))
        {
            return NULL;
        }

        return Carbon::parse($this->createdAtUTC, 'UTC');
    }

    public function getFrom()
    {
        if ($this->_oTransactionsFrom !== NULL)
        {
            return $this->_oTransactionsFrom;
        }

        $this->_oTransactionsFrom = new ArrayCollection();

        foreach ($this->from['trxs'] as $aTrx)
        {
            $this->_oTransactionsFrom->add(TransactionFrom::constructFrom($aTrx));
        }

        return $this->_oTransactionsFrom;
    }

    public function getTo()
    {
        if ($this->_oTransactionsTo !== NULL)
        {
            return $this->_oTransactionsTo;
        }

        $this->_oTransactionsTo = new ArrayCollection();

        foreach ($this->to['trxs'] as $aTrx)
        {
            $this->_oTransactionsTo->add(TransactionTo::constructFrom($aTrx));
        }

        return $this->_oTransactionsTo;
    }

    public function isConfirmed()
    {
        if ($this->getBlock() !== NULL || $this->block_id !== NULL)
        {
            return TRUE;
        }

        return $this->isConfirmed;
    }
}
