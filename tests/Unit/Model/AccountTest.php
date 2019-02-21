<?php

namespace WebDollar\Client\Tests\Unit\Model;

use PHPUnit\Framework\TestCase;
use WebDollar\Client\Model\Account;

/**
 * Class AccountTest
 * @package WebDollar\Client\Tests\Model
 */
class AccountTest extends TestCase
{
    public function testCreateFrom()
    {
        $oAccount = Account::constructFrom([
            'address'     => 'WEBD$gCsh0nNrsZv9VYQfe5Jn$9YMnD4hdyx62n$',
            'balance'     => 1000,
            'balance_raw' => 10000000,
            'publicKey'   => 'publicKey',
            'privateKey'  => 'privateKey',
            'version'     => 1,
        ]);

        static::assertEquals('WEBD$gCsh0nNrsZv9VYQfe5Jn$9YMnD4hdyx62n$', $oAccount->getAddress());
        static::assertEquals(1000, $oAccount->getBalance());
        static::assertEquals(10000000, $oAccount->getBalanceRaw());
        static::assertEquals('publicKey', $oAccount->getPublicKey());
        static::assertEquals('privateKey', $oAccount->getPrivateKey());
        static::assertEquals(1, $oAccount->getVersion());
    }
}
