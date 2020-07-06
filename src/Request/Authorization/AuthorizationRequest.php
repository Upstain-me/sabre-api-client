<?php

namespace Upstain\SabreApiClient\Request\Authorization;

use Upstain\SabreApiClient\Exception\SabreException;
use Upstain\SabreApiClient\Response\Authorization\AuthorizationResponse;
use Upstain\SabreApiClient\Sabre;
use Psr\Cache\CacheItemInterface;
use Psr\Cache\InvalidArgumentException;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

class AuthorizationRequest
{
    public const UPSTAIN_SABRE_AUTH_CACHE = 'UPSTAIN_SABRE_AUTH_CACHE';

    private Sabre $sabreObject;

    /**
     * @param Sabre $sabre
     */
    public function __construct(Sabre $sabre)
    {
        $this->sabreObject = $sabre;
    }

    /**
     * @param CacheInterface|null $cache
     * @return AuthorizationResponse
     * @throws SabreException
     */
    public function requestAuth(?CacheInterface $cache): AuthorizationResponse
    {
        try {
            return $cache ?
                $cache->get(self::UPSTAIN_SABRE_AUTH_CACHE, fn(CacheItemInterface $item) => $this->cacheCallback($item)) :
                $this->doRequest();
        } catch (InvalidArgumentException $e) {
            throw SabreException::authCacheError($e);
        }
    }

    /**
     * @param CacheItemInterface $cacheItem
     * @return AuthorizationResponse
     * @throws SabreException
     */
    private function cacheCallback(CacheItemInterface $cacheItem): AuthorizationResponse
    {
        $response = $this->doRequest();
        $expiresIn = (int) $response->getExpiresIn();
        $cacheItem->expiresAfter($expiresIn);
        return $response;
    }

    /**
     * @return AuthorizationResponse
     * @throws SabreException
     */
    private function doRequest(): AuthorizationResponse
    {
        $client = HttpClient::create([
            'headers' => [
                'Content-Type' => 'application/x-www-form-urlencoded',
                'Authorization' => 'Basic ' . $this->sabreObject->getUserSecret()
            ]
        ]);

        try {
            $response = $client->request(
                'POST',
                $this->sabreObject->getApiBaseUrl() . '/v2/auth/token',
                [
                    'body' => [
                        'grant_type' => 'client_credentials',
                    ],
                ],
            );

            $content = $response->toArray();

            return new AuthorizationResponse($content['access_token'], $content['token_type'], $content['expires_in']);
        } catch (
            ClientExceptionInterface |
            DecodingExceptionInterface |
            RedirectionExceptionInterface |
            ServerExceptionInterface |
            TransportExceptionInterface $e
        ) {
            throw SabreException::authError($e);
        }
    }
}
