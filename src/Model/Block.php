<?php

namespace WebDollar\Client\Model;

use Carbon\Carbon;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Class Block
 * @package WebDollar\Client\Model
 */
class Block extends AbstractModel
{
    /**
     * @var int
     */
    private $block_id;

    /**
     * @var string
     */
    private $hash;

    /**
     * @var int
     */
    private $nonce;

    /**
     * @var int
     */
    private $nonce_raw;

    /**
     * @var int
     */
    private $version;

    /**
     * @var string
     */
    private $previous_hash;

    /**
     * @var string
     */
    private $timestamp;

    /**
     * @var int
     */
    private $timestamp_UTC;

    /**
     * @var string
     */
    private $hash_data;

    /**
     * @var string
     */
    private $miner_address;

    /**
     * @var string
     */
    private $posMinerAddress;

    /**
     * @var string
     */
    private $posMinerPublicKey;

    /**
     * @var string
     */
    private $posSignature;

    /**
     * @var string
     */
    private $trxs_hash_data;

    /**
     * @var int
     */
    private $trxs_number;

    /**
     * @var array
     */
    private $trxs = [];

    /**
     * @var float
     */
    private $reward;

    /**
     * @var int
     */
    private $reward_raw;

    /**
     * @var string
     */
    private $createdAtUTC;

    /**
     * @var string
     */
    private $block_raw;

    /**
     * @var bool
     */
    private $isPOS;

    /**
     * @var bool
     */
    private $isPOW;

    /**
     * @var Collection
     */
    private $_oTransactions;

    /**
     * @var Account
     */
    private $_oMinerAccount;

    /**
     * @var Account
     */
    private $_oResolverAccount;

    /**
     * @return int
     */
    public function getNumber()
    {
        return $this->block_id;
    }

    /**
     * @return string
     */
    public function getHash()
    {
        return $this->hash;
    }

    /**
     * @return int
     */
    public function getNonce()
    {
        return $this->nonce;
    }

    /**
     * @return int
     */
    public function getNonceRaw()
    {
        return $this->nonce_raw;
    }

    /**
     * @return int
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @return string
     */
    public function getPreviousHash()
    {
        return $this->previous_hash;
    }

    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * @return int
     */
    public function getTimestampUTC()
    {
        return $this->timestamp_UTC;
    }

    /**
     * @return string
     */
    public function getHashData()
    {
        return $this->hash_data;
    }

    /**
     * @return Account
     */
    public function getMinerAccount()
    {
        if ($this->_oMinerAccount !== NULL)
        {
            return $this->_oMinerAccount;
        }

        return $this->_oMinerAccount = Account::constructFrom(['address' => $this->miner_address]);
    }

    public function getResolverAccount()
    {
        if ($this->_oResolverAccount !== NULL)
        {
            return $this->_oResolverAccount;
        }

        if ($this->posMinerAddress === NULL)
        {
            return $this->getMinerAccount();
        }

        return $this->_oResolverAccount = Account::constructFrom(['address' => $this->posMinerAddress, 'publicKey' => $this->posMinerPublicKey]);
    }

    public function getPOSSignature()
    {
        return $this->posSignature;
    }

    /**
     * @return string
     */
    public function getTransactionsHashData()
    {
        return $this->trxs_hash_data;
    }

    /**
     * @return int
     */
    public function getTransactionsNumber()
    {
        return $this->trxs_number;
    }

    /**
     * @return Collection|Transaction[]
     */
    public function getTransactions()
    {
        if ($this->_oTransactions !== NULL)
        {
            return $this->_oTransactions;
        }

        $this->_oTransactions = new ArrayCollection();

        foreach ($this->trxs as $nTransactionIndex => $mTransaction)
        {
            if (is_string($mTransaction))
            {
                $oTransaction = Transaction::constructFrom(['trx_id' => $mTransaction]);
            }
            elseif (is_array($mTransaction))
            {
                $oTransaction = Transaction::constructFrom($mTransaction);
            }
            else
            {
                throw new \RuntimeException(sprintf('Unable to process transaction index %s for block %s', $nTransactionIndex, $this->getNumber()));
            }

            $oTransaction->setBlock($this);
            $this->_oTransactions->add($oTransaction);
        }

        return $this->_oTransactions;
    }

    /**
     * @return float
     */
    public function getReward()
    {
        return $this->reward;
    }

    /**
     * @return int
     */
    public function getRewardRaw()
    {
        return $this->reward_raw;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getCreatedAtUTC()
    {
        return Carbon::parse($this->createdAtUTC, 'UTC');
    }

    /**
     * @return string
     */
    public function getBlockRaw()
    {
        return $this->block_raw;
    }

    public function isPOS()
    {
        return $this->isPOS;
    }

    public function isPOW()
    {
        return $this->isPOW;
    }
}
