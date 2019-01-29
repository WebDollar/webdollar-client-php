<?php

namespace WebDollar\Client\Methods;

use WebDollar\Client\Model\Account;

/**
 * Class Accounts
 * @package WebDollar\Client\Methods
 */
class Accounts extends AbstractMethod
{
    /**
     * @return Account[]
     */
    public function getAccounts()
    {
        $aAccounts = [];

        foreach ($this->getRawResult() as $mAddress)
        {
            if (is_string($mAddress))
            {
                $aAccounts[] = Account::constructFrom(['address' => $mAddress]);
            }
            elseif (is_array($mAddress))
            {
                $aAccounts[] = Account::constructFrom($mAddress);
            }
        }

        return $aAccounts;
    }

    /**
     * @param Account $oAccount
     *
     * @return float|null
     */
    public function getBalanceForAccount(Account $oAccount)
    {
        $aAccounts = $this->getAccounts();

        foreach ($aAccounts as $oExistingAccount)
        {
            if ($oExistingAccount->getAddress() === $oAccount->getAddress())
            {
                return $oAccount->getBalance();
            }
        }

        return NULL;
    }

    /**
     * @param Account $oAccount
     *
     * @return int|null
     */
    public function getBalanceRawForAccount(Account $oAccount)
    {
        $aAccounts = $this->getAccounts();

        foreach ($aAccounts as $oExistingAccount)
        {
            if ($oExistingAccount->getAddress() === $oAccount->getAddress())
            {
                return $oAccount->getBalanceRaw();
            }
        }

        return NULL;
    }
}
