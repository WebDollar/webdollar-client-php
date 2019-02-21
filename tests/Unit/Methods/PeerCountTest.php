<?php

namespace WebDollar\Client\Tests\Unit\Methods;

use PHPUnit\Framework\TestCase;
use WebDollar\Client\Methods\PeerCount;
use WebDollar\Client\Tests\Helpers\ResponseGenerator;

/**
 * Class PeerCountTest
 * @package WebDollar\Client\Tests\Unit\Methods
 */
class PeerCountTest extends TestCase
{
    public function testResponse()
    {
        $oMethod = new PeerCount();
        $oMethod->bind(ResponseGenerator::generateResponse([
            'clients'  => 1,
            'servers'  => 2,
            'webpeers' => 3,
        ]));

        static::assertEquals('peerCount', $oMethod->getMethodName());
        static::assertEquals(1, $oMethod->getClients());
        static::assertEquals(2, $oMethod->getServers());
        static::assertEquals(3, $oMethod->getWebpeers());
    }
}
