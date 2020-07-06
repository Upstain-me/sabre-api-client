<?php

namespace Upstain\SabreApiClient\Request\Hotel;

use Upstain\SabreApiClient\Exception\SabreException;
use Upstain\SabreApiClient\Request\Hotel\SearchCriteria\DefaultSearchCriteria;
use Upstain\SabreApiClient\Request\Hotel\SearchCriteria\SearchInput;
use Upstain\SabreApiClient\Response\Hotel\HotelAvailabilityResponse;
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

class HotelAvailabilityRequest
{
    public const UPSTAIN_SABRE_HOTEL_AVAILABILITY_CACHE = 'UPSTAIN_SABRE_HOTEL_AVAILABILITY_CACHE';
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
     * @param SearchInput $input
     * @param CacheInterface|null $cache
     * @return HotelAvailabilityResponse
     * @throws SabreException
     */
    public function fetch(SearchInput $input, ?CacheInterface $cache): HotelAvailabilityResponse
    {
        $searchCriteria = new DefaultSearchCriteria();
        $searchCriteria->build();

        $this->requestBody = [
            'GetHotelAvailRQ' => [
                'SearchCriteria' => $searchCriteria->override($input),
            ],
        ];

        try {
            return $cache ?
                $cache->get(
                    \implode(
                        '_',
                        [
                            self::UPSTAIN_SABRE_HOTEL_AVAILABILITY_CACHE,
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
     * @return HotelAvailabilityResponse
     * @throws SabreException
     */
    private function cacheCallback(CacheItemInterface $cacheItem): HotelAvailabilityResponse
    {
        $response = $this->doRequest();
        $dateInterval = new \DateInterval('P1D');
        $cacheItem->expiresAfter($dateInterval);

        return $response;
    }

    /**
     * @return HotelAvailabilityResponse
     * @throws SabreException
     */
    private function doRequest(): HotelAvailabilityResponse
    {
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

            return new HotelAvailabilityResponse($content);
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
