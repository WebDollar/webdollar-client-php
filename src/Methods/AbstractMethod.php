<?php

namespace WebDollar\Client\Methods;

use Graze\GuzzleHttp\JsonRpc\Message\ResponseInterface;
use WebDollar\Client\Contracts\ICommand;
use WebDollar\Client\Contracts\Methods\IMethod;
use WebDollar\Client\Exception\MethodNotFoundException;

/**
 * Class AbstractMethod
 * @package WebDollar\Client\Methods
 */
abstract class AbstractMethod
{
     /** @var string */
    private $_sMethodName;

    /**
     * @var ResponseInterface
     */
    private $_oResponse;

    public function __construct($methodName, ResponseInterface $oResponse)
    {
        $this->_sMethodName = $methodName;
        $this->_oResponse   = $oResponse;
    }

    public function getMethodName()
    {
        return $this->_sMethodName;
    }

    public function getResponse()
    {
        return $this->_oResponse;
    }

    public function getRawResult()
    {
        return $this->getResponse()->getRpcResult();
    }

    /**
     * @param ResponseInterface $oResponse
     * @param ICommand          $oCommand
     *
     * @return IMethod
     * @throws MethodNotFoundException
     */
    public static function constructFromResponseAndCommand(ResponseInterface $oResponse, ICommand $oCommand)
    {
        $sClassName = __NAMESPACE__. '\\' . ucfirst($oCommand->getName());

        if (class_exists($sClassName))
        {
            return new $sClassName($oCommand->getName(), $oResponse);
        }

        throw new MethodNotFoundException(sprintf('Method with name %s was not found', $oCommand->getName()));

    }

    /**
     * @param string $sKey
     * @param null   $sDefault
     *
     * @return mixed
     */
    protected function _getKeyFromResult($sKey, $sDefault = NULL)
    {
        if (isset($this->getRawResult()[$sKey]))
        {
            return $this->getRawResult()[$sKey];
        }

        return $sDefault;
    }
}
