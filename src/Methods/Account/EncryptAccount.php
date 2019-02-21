<?php

namespace WebDollar\Client\Methods\Account;

use WebDollar\Client\Methods\AbstractMethod;

/**
 * Class EncryptAccount
 * @package WebDollar\Client\Methods\Account
 */
class EncryptAccount extends AbstractMethod
{
    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->getRawResult();
    }
}
