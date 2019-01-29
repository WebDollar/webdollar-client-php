<?php

namespace WebDollar\Client\Methods;

/**
 * Class NetVersion
 * @package WebDollar\Client\Methods
 */
class NetVersion extends AbstractMethod
{
    public function getId()
    {
        return $this->_getKeyFromResult('id');
    }

    public function getName()
    {
        return $this->_getKeyFromResult('name');
    }
}
