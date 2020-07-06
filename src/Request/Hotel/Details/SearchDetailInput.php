<?php

namespace Upstain\SabreApiClient\Request\Hotel\Details;

use Upstain\SabreApiClient\Model\SearchInputInterface;

class SearchDetailInput implements SearchInputInterface
{
    private string $hotelCode;

    public function __toString()
    {
        return $this->hotelCode;
    }

    /**
     * @param string $hotelCode
     */
    public function setHotelCode(string $hotelCode): void
    {
        $this->hotelCode = $hotelCode;
    }

    /**
     * @return string
     */
    public function getHotelCode(): string
    {
        return $this->hotelCode;
    }
}
