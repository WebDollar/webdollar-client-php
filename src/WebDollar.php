<?php

namespace WebDollar\Client;

use Graze\GuzzleHttp\JsonRpc\Client;
use Graze\GuzzleHttp\JsonRpc\ClientInterface;
use Graze\GuzzleHttp\JsonRpc\Message\ResponseInterface;
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
 * @method NetVersion                       netVersion()
 * @method PeerCount                        peerCount()
 * @method ProtocolVersion                  protocolVersion()
 * @method Syncing                          syncing()
 * @method Accounts                         accounts($withBalance = FALSE)
 * @method BlockNumber                      blockNumber()
 * @method GetBalance                       getBalance($address)
 * @method GetTransactionCount              getTransactionCount($address, $tag = "latest")
 * @method GetBlockTransactionCountByHash   getBlockTransactionCountByHash($hash)
 * @method GetBlockTransactionCountByNumber getBlockTransactionCountByNumber($number)
 * @method SendTransaction                  sendTransaction(array $options)
 * @method SendRawTransaction               sendRawTransaction($base64EncodedTransaction)
 * @method GetBlockByHash                   getBlockByHash($hash, $returnTransactions = FALSE, $processHardForks = TRUE)
 * @method GetBlockByNumber                 getBlockByNumber($number, $returnTransactions = FALSE, $processHardForks = TRUE)
 */
class WebDollar
{
    /**
     * @var ClientInterface
     */
    protected $_oClient;

    const WEBDOLLAR_METHODS_NAMESPACE = '\\WebDollar\\Client\\Methods';

    public function __construct(array $options)
    {
        $options['rpc_error'] = TRUE;
        $this->_oClient = isset($options['client']) && $options['client'] instanceof ClientInterface ? $options['client'] : NULL;

        if ($this->_oClient === NULL)
        {
            $this->_oClient = Client::factory($options['url'], $options);
        }
    }

    public function __call($name, array $params)
    {
        if (substr($name, -5) === 'Async')
        {
            return $this->executeAsync(
                $this->getCommand(substr($name, 0, -5), $params)
            );
        }

        return $this->execute($this->getCommand($name, $params));
    }

    public function execute(ICommand $command)
    {
        return $this->executeAsync($command)->wait();
    }

    public function executeAsync(ICommand $command)
    {
        $oRequest = $this->_oClient->request(time(), $command->getName(), $command->toArray());
        return $this->_oClient->sendAsync($oRequest)->then(function(ResponseInterface $oResponse) use ($command) {
            return AbstractMethod::constructFromResponseAndCommand($oResponse, $command);
        });
    }

    public function getClient()
    {
        return $this->_oClient;
    }

    public static function factory(array $config = [])
    {
        return new static($config);
    }

    protected function getCommand($sName, $args = [])
    {
        return new Command($sName, $args);
    }
}
