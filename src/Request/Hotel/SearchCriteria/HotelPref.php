<?php

namespace Upstain\SabreApiClient\Request\Hotel\SearchCriteria;

class HotelPref
{
    private SabreRating $saberRating;

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'SabreRating' => $this->saberRating->toArray(),
        ];
    }

    /**
     * @param SabreRating $saberRating
     */
    public function setSaberRating(SabreRating $saberRating): void
    {
        $this->saberRating = $saberRating;
    }
}
