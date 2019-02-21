<?php

namespace WebDollar\Client\Methods\Account;

use WebDollar\Client\Methods\AbstractMethod;
use WebDollar\Client\Model\Account;

/**
 * Class NewAccount
 * @package WebDollar\Client\Methods\Account
 */
class NewAccount extends AbstractMethod
{
    /**
     * @return Account
     */
    public function getAccount()
    {
        return Account::constructFrom($this->getRawResult());
    }

    public function getPassword()
    {
        return $this->getRawResult()['password'] ?? NULL;
    }
}
