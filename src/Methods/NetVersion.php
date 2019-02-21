<?php

namespace WebDollar\Client\Methods;

/**
 * Class NetVersion
 * @package WebDollar\Client\Methods
 */
class NetVersion extends AbstractMethod
{
    /**
     * @return int
     */
    public function getId()
    {
        return $this->_getKeyFromResult('id');
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->_getKeyFromResult('name');
    }
}
