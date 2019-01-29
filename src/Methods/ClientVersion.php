<?php

namespace WebDollar\Client\Methods;

/**
 * Class ClientVersion
 * @package WebDollar\Client\Methods
 */
class ClientVersion extends AbstractMethod
{
    /**
     * @return string
     */
    public function getVersion()
    {
        return $this->getRawResult();
    }
}
