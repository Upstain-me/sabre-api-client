<?php

namespace Upstain\SabreApiClient\Request\Hotel;

use Upstain\SabreApiClient\Exception\SabreException;
use Upstain\SabreApiClient\Request\Hotel\Details\DefaultSearchCriteria;
use Upstain\SabreApiClient\Request\Hotel\Details\SearchDetailInput;
use Upstain\SabreApiClient\Response\Hotel\Details\HotelDetailsResponse;
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

class HotelDetailsRequest
{
    public const UPSTAIN_SABRE_HOTEL_DETAILS_CACHE = 'UPSTAIN_SABRE_HOTEL_DETAILS_CACHE';
    private Sabre $sabreObject;

    private array $requestBody;

    /**
     * @param Sabre $sabre
     */
    public function __construct(Sabre $sabre)
    {
        $this->sabreObject = $sabre;
    }

    /**
     * @param SearchDetailInput $input
     * @param CacheInterface|null $cache
     * @return HotelDetailsResponse
     * @throws SabreException
     */
    public function fetch(SearchDetailInput $input, ?CacheInterface $cache): HotelDetailsResponse
    {
        $searchCriteria = new DefaultSearchCriteria();
        $searchCriteria->build();

        $this->requestBody = [
            'GetHotelDetailsRQ' => [
                'version' => '1.1.0',
                'SearchCriteria' => $searchCriteria->override($input),
            ],
        ];

        try {
            return $cache ?
                $cache->get(
                    \implode(
                        '_',
                        [
                            self::UPSTAIN_SABRE_HOTEL_DETAILS_CACHE,
                            $input,
                        ]
                    ),
                    fn(CacheItemInterface $item) => $this->cacheCallback($item)
                ) :
                $this->doRequest();
        } catch (InvalidArgumentException $e) {
            throw SabreException::authCacheError($e);
        }
    }

    /**
     * @param CacheItemInterface $cacheItem
     * @return HotelDetailsResponse
     * @throws SabreException
     */
    private function cacheCallback(CacheItemInterface $cacheItem): HotelDetailsResponse
    {
        $response = $this->doRequest();
        $dateInterval = new \DateInterval('P1D');
        $cacheItem->expiresAfter($dateInterval);

        return $response;
    }

    /**
     * @return HotelDetailsResponse
     * @throws SabreException
     */
    private function doRequest(): HotelDetailsResponse
    {
        // TODO implement proper error handling for this and the list as well.
        $tokenType = \ucfirst($this->sabreObject->getAuthResponse()->getTokenType());
        $accessToken = $this->sabreObject->getAuthResponse()->getAccessToken();
        $client = HttpClient::create(
            [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                    'Authorization' => "$tokenType $accessToken",
                ],
            ]
        );

        try {
            $response = $client->request(
                'POST',
                $this->sabreObject->getApiBaseUrl().'/v2.1.0/get/hotelavail',
                [
                    'body' => \json_encode($this->requestBody, JSON_THROW_ON_ERROR),
                ],
            );

            $content = $response->toArray();

            return new HotelDetailsResponse($content);
        } catch (
            ClientExceptionInterface |
            DecodingExceptionInterface |
            RedirectionExceptionInterface |
            ServerExceptionInterface |
            TransportExceptionInterface $e
        ) {
            throw SabreException::authError($e);
        } catch (\JsonException $e) {
            // TODO proper error handling.
        }
    }
}
