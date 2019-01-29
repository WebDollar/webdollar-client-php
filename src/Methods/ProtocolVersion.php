<?php

namespace WebDollar\Client\Methods;

/**
 * Class ProtocolVersion
 * @package WebDollar\Client\Methods
 */
class ProtocolVersion extends AbstractMethod
{
    /**
     * @return string
     */
    public function getVersion()
    {
        return $this->getRawResult();
    }
}
