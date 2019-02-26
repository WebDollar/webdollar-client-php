<?php

namespace WebDollar\Client\Tests\Unit\Model;

use PHPUnit\Framework\TestCase;
use WebDollar\Client\Model\Account;
use WebDollar\Client\Model\Block;

/**
 * Class BlockTest
 * @package WebDollar\Client\Tests\Model
 */
class BlockTest extends TestCase
{
    public function testCreateFrom()
    {
        $oBlock = Block::constructFrom([
            "id"              => 608986,
            "block_id"        => 608986,
            "hash"            => "000000000000067135b94a2a280081d81e8e0ffb88e1aa9a25af66bea420fe87",
            "nonce"           => 0,
            "nonce_raw"       => 0,
            "version"         => 1,
            "previous_hash"   => "000000000000107c42ef4fbffc4bdb27d021ad17fcae065b0e61c39ef19f91c6",
            "timestamp"       => "Wed, 20 Feb 2019 19:01:25 GMT",
            "timestamp_UTC"   => 1550689285,
            "timestamp_block" => 25946973,
            "hash_data"       => "39ffc89171a288866d3192dd7425dab7d83c454af21e22f0e95d07a9eef2282d",
            "miner_address"   => 'WEBD$gCsh0nNrsZv9VYQfe5Jn$9YMnD4hdyx62n$',
            "trxs_hash_data"  => "e32cfe9c08c292faf1debea8562f7d46905e7c838001e7a2230dd63772329d70",
            "trxs_number"     => 1,
            "trxs" => [
                [
                    "trx_id"           => "e32cfe9c08c292faf1debea8562f7d46905e7c838001e7a2230dd63772329d70",
                    "version"          => 2,
                    "nonce"            => 7924,
                    "index"            => 0,
                    "time_lock"        => 608971,
                    "from_length"      => 1,
                    "to_length"        => 116,
                    "fee"              => 8.178,
                    "fee_raw"          => 81780,
                    "amount"           => 1000,
                    "amount_raw"       => 10000000,
                    "total_amount"     => 1008.178,
                    "total_amount_raw" => 10081780,
                    "timestamp"        => "Wed, 20 Feb 2019 19:01:25 GMT",
                    "timestamp_UTC"    => 1550689285,
                    "timestamp_block"  => 25946973,
                    "timestamp_raw"    => 25946973,
                    "createdAtUTC"     => "2019-02-20T19:01:25.000Z",
                    "block_id"         => 608986,
                    "from"             => [
                        "trxs" => [
                            [
                                "trx_from_address"    => 'WEBD$gCsh0nNrsZv9VYQfe5Jn$9YMnD4hdyx62n$',
                                "trx_from_pub_key"    => "c20d135a40514b06321e55eca97549bf5f8780cf64c225a97bb339c14aa47df6",
                                "trx_from_signature"  => "e9ff2ac208c28845d40340653ac1b9ab66fe84817849692e2dae4057aeb25198bab054fa38659596732358ab22bad3aafc4f7794b22cf7adc60f75813bc33a01",
                                "trx_from_amount"     => 1008.178,
                                "trx_from_amount_raw" => 10081780
                            ]
                        ],
                        "addresses" => [
                            'WEBD$gCsh0nNrsZv9VYQfe5Jn$9YMnD4hdyx62n$'
                        ],
                        "amount"     => 1008.178,
                        "amount_raw" => 10081780
                    ],
                    "to" => [
                        "trxs" => [
                            [
                                "trx_to_address"    => 'WEBD$gAI$1nWrRIxjT5t2oIGS@KdSZXo9hwZkRr$',
                                "trx_to_amount"     => 1000,
                                "trx_to_amount_raw" => 10000000
                            ]
                        ],
                        "addresses" => [
                            'WEBD$gAI$1nWrRIxjT5t2oIGS@KdSZXo9hwZkRr$',
                        ],
                        "amount"     => 1000,
                        "amount_raw" => 10000000
                    ],
                    "isConfirmed" => TRUE
                ]
            ],
            "reward"       =>  6000,
            "reward_raw"   =>  60000000,
            "createdAtUTC" =>  "2019-02-20T19:01:25.000Z",
            "block_raw"    =>  "block_raw",
            "isPOS"             =>  true,
            "isPOW"             =>  false,
            "posMinerAddress"   =>  'WEBD$gCrZ+RJXvKXSHp2b82MRUQT@eqRT5ffzAr$',
            "posMinerPublicKey" =>  "8701bd60ddaea391764d108321da44a71fdcecec5771bb634835bff0d8492178",
            "posSignature"      =>  "2258804812b60576d8aa5ef8d99e1db50d609b198e2fff7adaab85cb9513095afd8ef977eed98007feee72fe7783e56656ca8c859542b40790baa6a2d1b9800d"
        ]);

        static::assertInstanceOf(Block::class, $oBlock);
        static::assertEquals(608986, $oBlock->getNumber());
        static::assertEquals('000000000000067135b94a2a280081d81e8e0ffb88e1aa9a25af66bea420fe87', $oBlock->getHash());
        static::assertEquals(0, $oBlock->getNonce());
        static::assertEquals(0, $oBlock->getNonceRaw());
        static::assertEquals(1, $oBlock->getVersion());
        static::assertEquals('000000000000107c42ef4fbffc4bdb27d021ad17fcae065b0e61c39ef19f91c6', $oBlock->getPreviousHash());
        static::assertEquals('39ffc89171a288866d3192dd7425dab7d83c454af21e22f0e95d07a9eef2282d', $oBlock->getHashData());
        static::assertEquals('WEBD$gCsh0nNrsZv9VYQfe5Jn$9YMnD4hdyx62n$', $oBlock->getMinerAccount()->getAddress());
        static::assertEquals('e32cfe9c08c292faf1debea8562f7d46905e7c838001e7a2230dd63772329d70', $oBlock->getTransactionsHashData());
        static::assertEquals('Wed, 20 Feb 2019 19:01:25 GMT', $oBlock->getTimestamp());
        static::assertEquals('1550689285', $oBlock->getTimestampUTC());
        static::assertEquals(1, $oBlock->getTransactionsNumber());
        static::assertEquals(1, $oBlock->getTransactions()->count());
        static::assertEquals(6000, $oBlock->getReward());
        static::assertEquals(60000000, $oBlock->getRewardRaw());
        static::assertEquals('block_raw', $oBlock->getBlockRaw());

        static::assertEquals('WEBD$gCrZ+RJXvKXSHp2b82MRUQT@eqRT5ffzAr$', $oBlock->getResolverAccount()->getAddress());
        static::assertEquals('e32cfe9c08c292faf1debea8562f7d46905e7c838001e7a2230dd63772329d70', $oBlock->getTransactions()[0]->getHash());
        static::assertEquals('2258804812b60576d8aa5ef8d99e1db50d609b198e2fff7adaab85cb9513095afd8ef977eed98007feee72fe7783e56656ca8c859542b40790baa6a2d1b9800d', $oBlock->getPOSSignature());
        static::assertTrue($oBlock->isPOS());
        static::assertFalse($oBlock->isPOW());

        static::assertEquals(8.178, $oBlock->getFeeReward());
        static::assertEquals(81780, $oBlock->getFeeRewardRaw());
        static::assertEquals(6008.178, $oBlock->getTotalReward());
        static::assertEquals(60081780, $oBlock->getTotalRewardRaw());

        static::assertInstanceOf(Account::class, $oBlock->getMinerAccount());
        static::assertInstanceOf(Account::class, $oBlock->getResolverAccount());
        static::assertInstanceOf(\DateTimeInterface::class, $oBlock->getCreatedAtUTC());
    }

    public function testCreateFromWithoutFullTransactions()
    {
        $oBlock = Block::constructFrom([
            "id"   => 608986,
            "trxs" => [
                'e32cfe9c08c292faf1debea8562f7d46905e7c838001e7a2230dd63772329d70'
            ]
        ]);

        static::assertEquals('e32cfe9c08c292faf1debea8562f7d46905e7c838001e7a2230dd63772329d70', $oBlock->getTransactions()[0]->getHash());
    }

    public function testCreateFromWithoutValidTransactions()
    {
        $oBlock = Block::constructFrom([
            "id"   => 608986,
            "trxs" => [
                new \stdClass(),
            ]
        ]);

        $this->expectException(\RuntimeException::class);
        $oBlock->getTransactions();
    }

    public function testCreateWithPosMinerNull()
    {
        $oBlock = Block::constructFrom([
            "id"            => 608986,
            "miner_address" => 'WEBD$gCsh0nNrsZv9VYQfe5Jn$9YMnD4hdyx62n$',
        ]);

        static::assertEquals('WEBD$gCsh0nNrsZv9VYQfe5Jn$9YMnD4hdyx62n$', $oBlock->getResolverAccount()->getAddress());
    }

    public function testNotAddingNonExistingProperty()
    {
        $oBlock = Block::constructFrom([
            'non_existingProperty' => FALSE,
        ]);

        static::assertFalse(property_exists($oBlock, 'non_existingProperty'));
    }
}
