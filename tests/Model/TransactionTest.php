<?php

namespace WebDollar\Client\Tests\Model;

use PHPUnit\Framework\TestCase;
use WebDollar\Client\Model\Block;
use WebDollar\Client\Model\Transaction;

/**
 * Class TransactionTest
 * @package WebDollar\Client\Tests\Model
 */
class TransactionTest extends TestCase
{
    public function testCreateFrom()
    {
        $oTransaction = Transaction::constructFrom([
            'trx_id'           => 'e5dce0fe998482aa530bef49300372e9628d0d7787d54ff96101e94a3c3ecc24',
            'version'          => 2,
            'nonce'            => 1,
            'index'            => 0,
            'time_lock'        => 609218,
            'from_length'      => 1,
            'to_length'        => 1,
            'fee'              => 8.178,
            'fee_raw'          => 81780,
            'amount'           => 200,
            'amount_raw'       => 2000000,
            'total_amount'     => 208.178,
            'total_amount_raw' => 2081780,
            'timestamp'        => 'Wed, 20 Feb 2019 21:55:43 GMT',
            'timestamp_UTC'    => 1550699743,
            'timestamp_block'  => 25957431,
            'timestamp_raw'    => 25957431,
            'createdAtUTC'     => '2019-02-20T21:55:43.000Z',
            'block_id'         => 609220,
            'from'             => [
                'trxs' => [
                    [
                        'trx_from_address'    => 'WEBD$gAWL+3tf#rvtMh669p9k@XVMM5q0qITHKL$',
                        'trx_from_pub_key'    => 'fb798d876fd33292f73916e392060cfcbf17d54e1c8420f607cea27fe081f2ef',
                        'trx_from_signature'  => 'aa2490dbdaec9beb210a1d85a1e5933363a025393bcdaf41a4fff335e6b718ac50c4a0e6bf8bfe12735e5391b7ded4b080e64990a9d9897e4cabb3d9a28a410d',
                        'trx_from_amount'     => 208.178,
                        'trx_from_amount_raw' => 2081780
                    ]
                ],
                'addresses' => [
                    'WEBD$gAWL+3tf#rvtMh669p9k@XVMM5q0qITHKL$'
                ],
                'amount'     => 208.178,
                'amount_raw' => 2081780
            ],
            'to' => [
                'trxs' => [
                    [
                        'trx_to_address'    => 'WEBD$gC6xfx1Y2RjgHvnyd4mh2nHRa54jFVqtI3$',
                        'trx_to_amount'     => 200,
                        'trx_to_amount_raw' => 2000000
                    ]
                ],
                'addresses' => [
                    'WEBD$gC6xfx1Y2RjgHvnyd4mh2nHRa54jFVqtI3$'
                ],
                'amount'     => 200,
                'amount_raw' => 2000000
            ],
            'isConfirmed' => TRUE
        ]);

        static::assertEquals('e5dce0fe998482aa530bef49300372e9628d0d7787d54ff96101e94a3c3ecc24', $oTransaction->getHash());
        static::assertEquals(2, $oTransaction->getVersion());
        static::assertEquals(1, $oTransaction->getNonce());
        static::assertEquals(0, $oTransaction->getIndex());
        static::assertEquals(609218, $oTransaction->getTimeLock());
        static::assertEquals(1, $oTransaction->getFromLength());
        static::assertEquals(1, $oTransaction->getToLength());
        static::assertEquals(1, $oTransaction->getToLength());
        static::assertEquals(8.178, $oTransaction->getFee());
        static::assertEquals(81780, $oTransaction->getFeeRaw());
        static::assertEquals(200, $oTransaction->getAmount());
        static::assertEquals(2000000, $oTransaction->getAmountRaw());
        static::assertEquals(208.178, $oTransaction->getTotalAmount());
        static::assertEquals(2081780, $oTransaction->getTotalAmountRaw());
        static::assertEquals(609220, $oTransaction->getBlockNumber());
        static::assertNull($oTransaction->getBlock());

        static::assertCount(1, $oTransaction->getFrom());
        static::assertCount(1, $oTransaction->getTo());

        static::assertEquals('WEBD$gAWL+3tf#rvtMh669p9k@XVMM5q0qITHKL$', $oTransaction->getFrom()[0]->getAccount()->getAddress());
        static::assertEquals(208.178, $oTransaction->getFrom()[0]->getAmount());
        static::assertEquals(2081780, $oTransaction->getFrom()[0]->getAmountRaw());
        static::assertEquals('fb798d876fd33292f73916e392060cfcbf17d54e1c8420f607cea27fe081f2ef', $oTransaction->getFrom()[0]->getPubKey());
        static::assertEquals('aa2490dbdaec9beb210a1d85a1e5933363a025393bcdaf41a4fff335e6b718ac50c4a0e6bf8bfe12735e5391b7ded4b080e64990a9d9897e4cabb3d9a28a410d', $oTransaction->getFrom()[0]->getSignature());

        static::assertEquals('WEBD$gC6xfx1Y2RjgHvnyd4mh2nHRa54jFVqtI3$', $oTransaction->getTo()[0]->getAccount()->getAddress());
        static::assertEquals(200, $oTransaction->getTo()[0]->getAmount());
        static::assertEquals(2000000, $oTransaction->getTo()[0]->getAmountRaw());

        static::assertTrue($oTransaction->isConfirmed());

        static::assertInstanceOf(\DateTimeInterface::class, $oTransaction->getCreatedAt());
    }

    public function testCreateFromWithBlockObject()
    {
        $oBlock = Block::constructFrom([
            'block_id' => 1,
        ]);
        $oTransaction = Transaction::constructFrom([
            'trx_id' => 'test'
        ]);

        $oTransaction->setBlock($oBlock);

        static::assertEquals(1, $oTransaction->getBlockNumber());
    }

    public function testCreateWithPendingTransaction()
    {
        $oTransaction = Transaction::constructFrom([
            'trx_id' => 'test'
        ]);

        static::assertNull($oTransaction->getCreatedAt());
        static::assertFalse($oTransaction->isConfirmed());
    }
}
