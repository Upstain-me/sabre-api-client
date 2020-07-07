<?php

namespace Upstain\SabreApiClient\Response\Hotel;

class HotelAvailabilityResponse
{
    /**
     * @var mixed
     */
    private $rawResponse;

    /**
     * @param mixed $rawResponse
     */
    public function __construct($rawResponse)
    {
        $this->rawResponse = $rawResponse;
    }

    /**
     * @return mixed
     */
    public function getRawResponse()
    {
        return $this->rawResponse;
    }

    public function fromRawResponse(): HotelAvailInfos
    {
        return new HotelAvailInfos($this->rawResponse);
    }
}
