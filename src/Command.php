<?php

namespace WebDollar\Client;

use Graze\GuzzleHttp\JsonRpc\ClientInterface;
use Graze\GuzzleHttp\JsonRpc\Message\ResponseInterface;
use GuzzleHttp\Promise\PromiseInterface;
use WebDollar\Client\Contracts\Component\IInput;
use WebDollar\Client\Contracts\ICommand;
use WebDollar\Client\Contracts\Methods\IMethod;
use WebDollar\Client\Exception\MethodNotFoundException;

/**
 * Class Command
 * @package WebDollar\Client
 */
class Command implements ICommand
{
    /**
     * @var string
     */
    private $_sName;

    /**
     * @var ClientInterface
     */
    private $_oClient;

    /**
     * @var IMethod
     */
    private $_oMethod;

    public function __construct($name)
    {
        $this->setName($name);
        $this->_initMethod($name);
    }

    public function getClient():? ClientInterface
    {
        return $this->_oClient;
    }

    public function setClient(ClientInterface $oClient): void
    {
        $this->_oClient = $oClient;
    }

    public function getName()
    {
        return $this->_sName;
    }

    public function setName(string $name): void
    {
        $this->_validateName($name);
        $this->_sName = $name;
    }

    public function run(IInput $oInput): PromiseInterface
    {
        if (($this->_oClient instanceof ClientInterface) === FALSE)
        {
            throw new \RuntimeException(sprintf('Client must be an instance of %s', ClientInterface::SPEC));
        }

        $oRequest = $this->_oClient->request(time(), $this->getName(), $oInput->getParameters());

        return $this->_oClient->sendAsync($oRequest)->then(function(ResponseInterface $oResponse) {
            return $this->getMethod()->bind($oResponse);
        });
    }

    public function getMethod()
    {
        return $this->_oMethod;
    }

    private function _initMethod(string $sName)
    {
        $sClassName = __NAMESPACE__. '\\Methods\\' . ucfirst($sName);

        if (class_exists($sClassName))
        {
            $this->_oMethod = new $sClassName();
            return;
        }

        throw new MethodNotFoundException(sprintf('Method with name %s was not found', $sName));
    }

    private function _validateName(string $sName)
    {
        if (!preg_match('/^[a-z0-9]+$/i', $sName))
        {
            throw new \InvalidArgumentException(sprintf('Command name "%s" is invalid.', $sName));
        }
    }
}
