<?php

namespace WebDollar\Client\Model;

use Carbon\Carbon;

/**
 * Class Block
 * @package WebDollar\Client\Model
 */
class Block extends AbstractModel
{
    /**
     * @var int
     */
    private $id;

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
    private $timestamp_block;

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
    private $trx_hash_data;

    /**
     * @var int
     */
    private $trx_number;

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
     * @return string
     */
    public function getMinerAddress()
    {
        return $this->miner_address;
    }

    /**
     * @return string
     */
    public function getTransactionsHashData()
    {
        return $this->trx_hash_data;
    }

    /**
     * @return int
     */
    public function getTransactionsNumber()
    {
        return $this->trx_number;
    }

    /**
     * @return array
     */
    public function getTransactions()
    {
        $aTransactions = [];

        foreach ($this->trxs as $mTransaction)
        {
            if (is_string($mTransaction))
            {
                $aTransactions[] = Transaction::constructFrom(['hash' => $mTransaction]);
            }
            elseif (is_array($mTransaction))
            {
                $aTransactions[] = Transaction::constructFrom($mTransaction);
            }
        }

        return $aTransactions;
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
}
