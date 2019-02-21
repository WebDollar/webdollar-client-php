<?php

namespace WebDollar\Client\Methods;

use Graze\GuzzleHttp\JsonRpc\Message\ResponseInterface;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;
use WebDollar\Client\Contracts\Methods\IMethod;

/**
 * Class AbstractMethod
 * @package WebDollar\Client\Methods
 */
abstract class AbstractMethod implements IMethod
{
    /**
     * @var ResponseInterface
     */
    private $_oResponse;

    /**
     * @var array
     */
    private static $_aMethods;

    /**
     * @param ResponseInterface $oResponse
     *
     * @return IMethod
     */
    public function bind(ResponseInterface $oResponse): IMethod
    {
        $this->_oResponse = $oResponse;
        return $this;
    }

    /**
     * @return string
     */
    public function getMethodName()
    {
        return lcfirst(substr(static::class, strrpos(static::class, '\\')+1));
    }

    /**
     * @return ResponseInterface
     */
    public function getResponse()
    {
        return $this->_oResponse;
    }

    public function getRawResult()
    {
        return $this->getResponse()->getRpcResult();
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

    /**
     * @return string[]
     */
    public static function getMethods()
    {
        if (static::$_aMethods !== NULL)
        {
            return static::$_aMethods;
        }

        $oFinder = new Finder();

        /** @var SplFileInfo[] $aFiles */
        $aFiles  = $oFinder->files()->name('*.php')->notName('Abstract*')->in(__DIR__);

        static::$_aMethods = [];

        foreach ($aFiles as $oFile)
        {
            static::$_aMethods[lcfirst($oFile->getBasename('.php'))] = implode('\\', array_filter([__NAMESPACE__, $oFile->getRelativePath(), $oFile->getBasename('.php')]));
        }

        return static::$_aMethods;
    }
}
