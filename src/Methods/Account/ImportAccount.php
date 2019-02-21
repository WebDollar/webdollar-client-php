<?php

namespace WebDollar\Client\Methods\Account;

use WebDollar\Client\Methods\AbstractMethod;
use WebDollar\Client\Model\Account;

/**
 * Class ImportAccount
 * @package WebDollar\Client\Methods\Account
 */
class ImportAccount extends AbstractMethod
{
    /**
     * @return Account
     */
    public function getAccount()
    {
        return Account::constructFrom($this->getRawResult());
    }
}
