<?php

namespace Upstain\SabreApiClient\Request\Hotel\Details;

use Upstain\SabreApiClient\Model\Hotel\Hotel;

class HotelRef extends Hotel
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'HotelCode' => $this->hotelCode,
            'CodeContext' => $this->codeContext,
        ];
    }
}
