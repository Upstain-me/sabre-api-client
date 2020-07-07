<?php

namespace Upstain\SabreApiClient\Response\Hotel\Details;

class HotelDetailsResponse
{
    /**
     * @var array<string, mixed>
     */
    private array $rawResponse;

    /**
     * @param array<string, mixed> $rawResponse
     */
    public function __construct(array $rawResponse)
    {
        $this->rawResponse = $rawResponse;
    }

    /**
     * @return array<string, mixed>
     */
    public function getRawResponse(): array
    {
        return $this->rawResponse;
    }

    /**
     * @return HotelDetailsInfo
     */
    public function fromRawResponse(): HotelDetailsInfo
    {
        return new HotelDetailsInfo($this->rawResponse['GetHotelDetailsRS']['HotelDetailsInfo']);
    }
}
