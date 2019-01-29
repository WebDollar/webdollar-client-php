<?php

namespace WebDollar\Client\Methods;

/**
 * Class PeerCount
 * @package WebDollar\Client\Methods
 */
class PeerCount extends AbstractMethod
{
    /**
     * @return int
     */
    public function getClients()
    {
        return $this->_getKeyFromResult('clients');
    }

    /**
     * @return int
     */
    public function getServers()
    {
        return $this->_getKeyFromResult('servers');
    }

    /**
     * @return int
     */
    public function getWebpeers()
    {
        return $this->_getKeyFromResult('webpeers');
    }
}
