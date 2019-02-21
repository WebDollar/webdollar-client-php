<?php

namespace WebDollar\Client\Tests\Unit\Methods;

use PHPUnit\Framework\TestCase;
use WebDollar\Client\Methods\GetBlockByNumber;
use WebDollar\Client\Model\Block;
use WebDollar\Client\Tests\Helpers\ResponseGenerator;

/**
 * Class GetBlockByNumberTest
 * @package WebDollar\Client\Tests\Unit\Methods
 */
class GetBlockByNumberTest extends TestCase
{
    public function testResponse()
    {
        $oMethod = new GetBlockByNumber();
        $oMethod->bind(ResponseGenerator::generateResponse([

        ]));

        static::assertEquals('getBlockByNumber', $oMethod->getMethodName());
        static::assertInstanceOf(Block::class, $oMethod->getBlock());
    }

    public function testResponseNotFound()
    {
        $oMethod = new GetBlockByNumber();
        $oMethod->bind(ResponseGenerator::generateResponse(NULL));

        static::assertEquals('getBlockByNumber', $oMethod->getMethodName());
        static::assertNull($oMethod->getBlock());
    }
}
