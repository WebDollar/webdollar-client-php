<?php

namespace WebDollar\Client\Component;

use Graze\GuzzleHttp\JsonRpc\Client;
use Graze\GuzzleHttp\JsonRpc\Message\MessageFactory;
use Graze\GuzzleHttp\JsonRpc\Message\MessageFactoryInterface;
use GuzzleHttp\ClientInterface as HttpClientInterface;
use WebDollar\Client\Middleware\ErrorMiddleware;
use GuzzleHttp\Client as HttpClient;

/**
 * Class GrazeClient
 * @package WebDollar\Client\Component
 */
class GrazeClient extends Client
{
    public function __construct(HttpClientInterface $httpClient, MessageFactoryInterface $factory)
    {
        parent::__construct($httpClient, $factory);

        $this->httpClient->getConfig('handler')->push(new ErrorMiddleware());
    }

    /**
     * @param  string $uri
     * @param  array  $config
     *
     * @return Client
     */
    public static function factory($uri, array $config = [])
    {
        if (isset($config['message_factory'])) {
            $factory = $config['message_factory'];
            unset($config['message_factory']);
        } else {
            $factory = new MessageFactory();
        }

        return new static(new HttpClient(array_merge($config, [
            'base_uri' => $uri,
        ])), $factory);
    }
}
