<?php

namespace WebDollar\Client\Tests\Unit\Methods;

use PHPUnit\Framework\TestCase;
use WebDollar\Client\Methods\GetBlocksByNumbers;
use WebDollar\Client\Model\Block;
use WebDollar\Client\Tests\Helpers\ResponseGenerator;

class GetBlocksByNumbersTest extends TestCase
{
    public function testResponse()
    {
        $oMethod = new GetBlocksByNumbers();
        $oMethod->bind(ResponseGenerator::generateResponse([
            [
                'block_id' => 1
            ]
        ]));

        static::assertEquals('getBlocksByNumbers', $oMethod->getMethodName());
        static::assertNotEmpty($oMethod->getBlocks());
        static::assertCount(1, $oMethod->getBlocks());
        static::assertInstanceOf(Block::class, $oMethod->getBlocks()[0]);
    }
}
