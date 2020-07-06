<?php

namespace Upstain\SabreApiClient\Response\Hotel\Details;

class HotelDetailsResponse
{
    private array $rawResponse;

    /**
     * @param array $rawResponse
     */
    public function __construct(array $rawResponse)
    {
        $this->rawResponse = $rawResponse;
    }

    /**
     * @return array
     */
    public function getRawResponse(): array
    {
        return $this->rawResponse;
    }

    public function fromRawResponse(): array
    {
        // TODO modelling needs to be done.
        return $this->rawResponse;
    }
}
