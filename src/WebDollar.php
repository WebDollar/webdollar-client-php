<?php

namespace WebDollar\Client;

use Graze\GuzzleHttp\JsonRpc\Client;
use Graze\GuzzleHttp\JsonRpc\ClientInterface;
use Graze\GuzzleHttp\JsonRpc\Message\ResponseInterface;
use GuzzleHttp\Promise\PromiseInterface;
use WebDollar\Client\Component\Input;
use WebDollar\Client\Contracts\ICommand;
use WebDollar\Client\Methods\AbstractMethod;
use WebDollar\Client\Methods\Accounts;
use WebDollar\Client\Methods\BlockNumber;
use WebDollar\Client\Methods\ClientVersion;
use WebDollar\Client\Methods\GetBalance;
use WebDollar\Client\Methods\GetBlockByHash;
use WebDollar\Client\Methods\GetBlockByNumber;
use WebDollar\Client\Methods\GetBlockTransactionCountByHash;
use WebDollar\Client\Methods\GetBlockTransactionCountByNumber;
use WebDollar\Client\Methods\GetTransactionCount;
use WebDollar\Client\Methods\NetVersion;
use WebDollar\Client\Methods\PeerCount;
use WebDollar\Client\Methods\ProtocolVersion;
use WebDollar\Client\Methods\SendRawTransaction;
use WebDollar\Client\Methods\SendTransaction;
use WebDollar\Client\Methods\Syncing;

/**
 * Class WebDollar
 * @package WebDollar\Client
 *
 * @method ClientVersion                    clientVersion()
 * @method PromiseInterface                 clientVersionAsync()
 * @method NetVersion                       netVersion()
 * @method PromiseInterface                 netVersionAsync()
 * @method PeerCount                        peerCount()
 * @method PromiseInterface                 peerCountAsync()
 * @method ProtocolVersion                  protocolVersion()
 * @method PromiseInterface                 protocolVersionAsync()
 * @method Syncing                          syncing()
 * @method PromiseInterface                 syncingAsync()
 * @method Accounts                         accounts($withBalance = FALSE)
 * @method PromiseInterface                 accountsAsync($withBalance = FALSE)
 * @method BlockNumber                      blockNumber()
 * @method PromiseInterface                 blockNumberAsync()
 * @method GetBalance                       getBalance($address)
 * @method PromiseInterface                 getBalanceAsync($address)
 * @method GetTransactionCount              getTransactionCount($address, $tag = "latest")
 * @method PromiseInterface                 getTransactionCountAsync($address, $tag = "latest")
 * @method GetBlockTransactionCountByHash   getBlockTransactionCountByHash($hash)
 * @method PromiseInterface                 getBlockTransactionCountByHashAsync($hash)
 * @method GetBlockTransactionCountByNumber getBlockTransactionCountByNumber($number)
 * @method PromiseInterface                 getBlockTransactionCountByNumberAsync($number)
 * @method SendTransaction                  sendTransaction(array $options)
 * @method PromiseInterface                 sendTransactionAsync(array $options)
 * @method SendRawTransaction               sendRawTransaction($base64EncodedTransaction)
 * @method PromiseInterface                 sendRawTransactionAsync($base64EncodedTransaction)
 * @method GetBlockByHash                   getBlockByHash($hash, $returnTransactions = FALSE, $processHardForks = TRUE)
 * @method PromiseInterface                 getBlockByHashAsync($hash, $returnTransactions = FALSE, $processHardForks = TRUE)
 * @method GetBlockByNumber                 getBlockByNumber($number, $returnTransactions = FALSE, $processHardForks = TRUE)
 * @method PromiseInterface                 getBlockByNumberAsync($number, $returnTransactions = FALSE, $processHardForks = TRUE)
 */
class WebDollar
{
    /**
     * @var ClientInterface
     */
    protected $_oRPCClient;

    const WEBDOLLAR_METHODS_NAMESPACE = '\\WebDollar\\Client\\Methods';

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
