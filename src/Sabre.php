<?php

namespace Upstain\SabreApiClient;

use Upstain\SabreApiClient\Request\Authorization\AuthorizationRequest;
use Upstain\SabreApiClient\Request\Hotel\Details\SearchDetailInput;
use Upstain\SabreApiClient\Request\Hotel\HotelAvailabilityRequest;
use Upstain\SabreApiClient\Request\Hotel\HotelDetailsRequest;
use Upstain\SabreApiClient\Request\Hotel\SearchCriteria\SearchInput;
use Upstain\SabreApiClient\Response\Authorization\AuthorizationResponse;
use Upstain\SabreApiClient\Response\Hotel\Details\HotelDetailsResponse;
use Upstain\SabreApiClient\Response\Hotel\HotelAvailabilityResponse;
use Symfony\Contracts\Cache\CacheInterface;

class Sabre
{
    private string $apiBaseUrl;
    private string $userSecret;
    private AuthorizationResponse $authResponse;

    /**
     * Sabre constructor.
     * @param string $apiBaseUrl
     * @param string $userSecret
     */
    public function __construct(string $apiBaseUrl, string $userSecret)
    {
        $this->apiBaseUrl = $apiBaseUrl;
        $this->userSecret = $userSecret;
    }

    /**
     * @param CacheInterface|null $cache
     * @return self
     * @throws Exception\SabreException
     */
    public function authenticate(?CacheInterface $cache = null): self
    {
        $authentication = new AuthorizationRequest($this);

        $this->authResponse = $authentication->requestAuth($cache);
        return $this;
    }

    /**
     * @param SearchInput $input
     * @param CacheInterface|null $cache
     * @return HotelAvailabilityResponse
     * @throws Exception\SabreException
     */
    public function hotelAvailability(SearchInput $input, ?CacheInterface $cache = null): HotelAvailabilityResponse
    {
        $request = new HotelAvailabilityRequest($this);

        return $request->fetch($input, $cache);
    }

    public function hotelDetails(SearchDetailInput $input, ?CacheInterface $cache = null): HotelDetailsResponse
    {
        return (new HotelDetailsRequest($this))->fetch($input, $cache);
    }

    /**
     * @return string
     */
    public function getApiBaseUrl(): string
    {
        return $this->apiBaseUrl;
    }

    /**
     * @return string
     */
    public function getUserSecret(): string
    {
        return $this->userSecret;
    }

    /**
     * @return AuthorizationResponse
     */
    public function getAuthResponse(): AuthorizationResponse
    {
        return $this->authResponse;
    }
}
