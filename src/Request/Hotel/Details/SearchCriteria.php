<?php

namespace Upstain\SabreApiClient\Request\Hotel\Details;

use Upstain\SabreApiClient\Model\Hotel\RateInfoRef;

class SearchCriteria
{
    /**
     * @var HotelRef[]
     */
    private array $hotelRefs = [];

    /**
     * @var RateInfoRef
     */
    private RateInfoRef $rateInfoRef;

    private HotelContentRef $hotelContentRef;

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'HotelRefs' => [
                'HotelRef' => $this->hotelRefs[0]->toArray(),
            ],
            'RateInfoRef' => $this->rateInfoRef->toArray(),
            'HotelContentRef' => $this->hotelContentRef->toArray(),
        ];
    }

    /**
     * @param HotelRef[] $hotelRefs
     */
    public function setHotelRefs(array $hotelRefs): void
    {
        $this->hotelRefs = $hotelRefs;
    }

    /**
     * @param RateInfoRef $rateInfoRef
     */
    public function setRateInfoRef(RateInfoRef $rateInfoRef): void
    {
        $this->rateInfoRef = $rateInfoRef;
    }

    /**
     * @param HotelContentRef $hotelContentRef
     */
    public function setHotelContentRef(HotelContentRef $hotelContentRef): void
    {
        $this->hotelContentRef = $hotelContentRef;
    }
}
