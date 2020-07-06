<?php

namespace Upstain\SabreApiClient\Request\Hotel\Details;

use Upstain\SabreApiClient\Model\Hotel\Hotel;

class HotelRef extends Hotel
{
    public function toArray(): array
    {
        return [
            'HotelCode' => $this->hotelCode,
            'CodeContext' => $this->codeContext,
        ];
    }
}
