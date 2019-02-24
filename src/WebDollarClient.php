<?php

namespace WebDollar\Client;

use Graze\GuzzleHttp\JsonRpc\Client;
use Graze\GuzzleHttp\JsonRpc\ClientInterface;
use GuzzleHttp\Promise\PromiseInterface;
use WebDollar\Client\Component\Input;
use WebDollar\Client\Contracts\ICommand;
use WebDollar\Client\Methods\Account\Accounts;
use WebDollar\Client\Methods\Account\DeleteAccount;
use WebDollar\Client\Methods\Account\EncryptAccount;
use WebDollar\Client\Methods\Account\ExportAccount;
use WebDollar\Client\Methods\Account\ImportAccount;
use WebDollar\Client\Methods\Account\NewAccount;
use WebDollar\Client\Methods\BlockNumber;
use WebDollar\Client\Methods\ClientVersion;
use WebDollar\Client\Methods\GetBalance;
use WebDollar\Client\Methods\GetBlockByHash;
use WebDollar\Client\Methods\GetBlockByNumber;
use WebDollar\Client\Methods\GetBlockCount;
use WebDollar\Client\Methods\GetBlocksByNumbers;
use WebDollar\Client\Methods\GetBlocksByRange;
use WebDollar\Client\Methods\GetBlockTransactionCountByHash;
use WebDollar\Client\Methods\GetBlockTransactionCountByNumber;
use WebDollar\Client\Methods\GetTransactionByBlockHashAndIndex;
use WebDollar\Client\Methods\GetTransactionByBlockNumberAndIndex;
use WebDollar\Client\Methods\GetTransactionByHash;
use WebDollar\Client\Methods\GetTransactionCount;
use WebDollar\Client\Methods\NetVersion;
use WebDollar\Client\Methods\NetworkHashRate;
use WebDollar\Client\Methods\PeerCount;
use WebDollar\Client\Methods\ProtocolVersion;
use WebDollar\Client\Methods\SendRawTransaction;
use WebDollar\Client\Methods\SendTransaction;
use WebDollar\Client\Methods\Syncing;

/**
 * Class WebDollar
 * @package WebDollar\Client
 *
 * @method Accounts                            accounts($withBalance = FALSE)
 * @method PromiseInterface                    accountsAsync($withBalance = FALSE)
 * @method DeleteAccount                       deleteAccount($account, $password = NULL)
 * @method PromiseInterface                    deleteAccountAsync($account, $password = NULL)
 * @method EncryptAccount                      encryptAccount($account)
 * @method PromiseInterface                    encryptAccountAsync($account)
 * @method ExportAccount                       exportAccount($account)
 * @method PromiseInterface                    exportAccountAsync($account)
 * @method ImportAccount                       importAccount($data)
 * @method PromiseInterface                    importAccountAsync($data)
 * @method NewAccount                          newAccount($encrypt = FALSE)
 * @method PromiseInterface                    newAccountAsync($encrypt = FALSE)
 * @method BlockNumber                         blockNumber()
 * @method PromiseInterface                    blockNumberAsync()
 * @method ClientVersion                       clientVersion()
 * @method PromiseInterface                    clientVersionAsync()
 * @method GetBalance                          getBalance($account)
 * @method PromiseInterface                    getBalanceAsync($account)
 * @method GetBlockByHash                      getBlockByHash($hash, $returnTransactions = FALSE, $processHardForks = TRUE)
 * @method PromiseInterface                    getBlockByHashAsync($hash, $returnTransactions = FALSE, $processHardForks = TRUE)
 * @method GetBlockByNumber                    getBlockByNumber($number, $returnTransactions = FALSE, $processHardForks = TRUE)
 * @method PromiseInterface                    getBlockByNumberAsync($number, $returnTransactions = FALSE, $processHardForks = TRUE)
 * @method GetBlockCount                       getBlockCount($account)
 * @method PromiseInterface                    getBlockCountAsync($account)
 * @method GetBlocksByNumbers                  getBlocksByNumbers($blockNumbers, $returnTransactions = FALSE, $processHardForks = TRUE)
 * @method PromiseInterface                    getBlocksByNumbersAsync($blockNumbers, $returnTransactions = FALSE, $processHardForks = TRUE)
 * @method GetBlocksByRange                    getBlocksByRange(array $blocksRange, $returnTransactions = FALSE, $processHardForks = TRUE)
 * @method PromiseInterface                    getBlocksByRangeAsync(array $blocksRange, $returnTransactions = FALSE, $processHardForks = TRUE)
 * @method GetBlockTransactionCountByHash      getBlockTransactionCountByHash($hash)
 * @method PromiseInterface                    getBlockTransactionCountByHashAsync($hash)
 * @method GetBlockTransactionCountByNumber    getBlockTransactionCountByNumber($number)
 * @method PromiseInterface                    getBlockTransactionCountByNumberAsync($number)
 * @method GetTransactionByBlockHashAndIndex   getTransactionByBlockHashAndIndex($hash, $index)
 * @method PromiseInterface                    getTransactionByBlockHashAndIndexAsync($hash, $index)
 * @method GetTransactionByBlockNumberAndIndex getTransactionByBlockNumberAndIndex($blockNumber, $index)
 * @method PromiseInterface                    getTransactionByBlockNumberAndIndexAsync($blockNumber, $index)
 * @method GetTransactionByHash                getTransactionByHash($hash)
 * @method PromiseInterface                    getTransactionByHashAsync($hash)
 * @method GetTransactionCount                 getTransactionCount($address, $tag = "latest")
 * @method PromiseInterface                    getTransactionCountAsync($address, $tag = "latest")
 * @method NetVersion                          netVersion()
 * @method PromiseInterface                    netVersionAsync()
 * @method NetworkHashRate                     networkHashRate()
 * @method PromiseInterface                    networkHashRateAsync()
 * @method PeerCount                           peerCount()
 * @method PromiseInterface                    peerCountAsync()
 * @method ProtocolVersion                     protocolVersion()
 * @method PromiseInterface                    protocolVersionAsync()
 * @method SendTransaction                     sendTransaction(array $options)
 * @method PromiseInterface                    sendTransactionAsync(array $options)
 * @method SendRawTransaction                  sendRawTransaction($base64EncodedTransaction)
 * @method PromiseInterface                    sendRawTransactionAsync($base64EncodedTransaction)
 * @method Syncing                             syncing()
 * @method PromiseInterface                    syncingAsync()
 */
class WebDollarClient
{
    /**
     * @var ClientInterface
     */
    protected $_oRPCClient;

    public function __construct(array $options)
    {
        $options['rpc_error'] = TRUE;
        $this->_oRPCClient = isset($options['client']) && $options['client'] instanceof ClientInterface ? $options['client'] : NULL;

        if ($this->_oRPCClient === NULL)
        {
            $this->_oRPCClient = Client::factory($options['url'], $options);
        }
    }

    public function __call($name, array $params)
    {
        if (substr($name, -5) === 'Async')
        {
            return $this->executeAsync($this->getCommand(substr($name, 0, -5)), $params);
        }

        return $this->execute($this->getCommand($name), $params);
    }

    public function execute(ICommand $command, array $params)
    {
        return $this->executeAsync($command, $params)->wait();
    }

    public function executeAsync(ICommand $command, array $params)
    {
        return $command->run(new Input($params));
    }

    public function getRPCClient()
    {
        return $this->_oRPCClient;
    }

    public static function factory(array $config = [])
    {
        return new static($config);
    }

    protected function getCommand($sName)
    {
        $oCommand = new Command($sName);
        $oCommand->setClient($this->_oRPCClient);
        return $oCommand;
    }
}
