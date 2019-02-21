<?php

namespace WebDollar\Client\Tests\Unit\Methods;

use PHPUnit\Framework\TestCase;
use WebDollar\Client\Methods\GetBlockByHash;
use WebDollar\Client\Model\Block;
use WebDollar\Client\Tests\Helpers\ResponseGenerator;

/**
 * Class GetBlockByHashTest
 * @package WebDollar\Client\Tests\Unit\Methods
 */
class GetBlockByHashTest extends TestCase
{
    public function testResponse()
    {
        $oMethod = new GetBlockByHash();
        $oMethod->bind(ResponseGenerator::generateResponse([

        ]));

        static::assertEquals('getBlockByHash', $oMethod->getMethodName());
        static::assertInstanceOf(Block::class, $oMethod->getBlock());
    }

    public function testResponseNotFound()
    {
        $oMethod = new GetBlockByHash();
        $oMethod->bind(ResponseGenerator::generateResponse(NULL));

        static::assertEquals('getBlockByHash', $oMethod->getMethodName());
        static::assertNull($oMethod->getBlock());
    }
}
