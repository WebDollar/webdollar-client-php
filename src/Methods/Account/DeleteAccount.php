<?php

namespace WebDollar\Client\Methods\Account;

use WebDollar\Client\Methods\AbstractMethod;

/**
 * Class DeleteAccount
 * @package WebDollar\Client\Methods\Account
 */
class DeleteAccount extends AbstractMethod
{
    /**
     * @return bool
     */
    public function isSuccessful()
    {
        return $this->getRawResult() === TRUE;
    }
}
