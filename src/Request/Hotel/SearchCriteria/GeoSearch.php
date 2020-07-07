<?php

namespace Upstain\SabreApiClient\Request\Hotel\SearchCriteria;

class GeoSearch
{
    private GeoRef $geoRef;

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'GeoRef' => $this->geoRef->toArray(),
        ];
    }

    /**
     * @param GeoRef $geoRef
     */
    public function setGeoRef(GeoRef $geoRef): void
    {
        $this->geoRef = $geoRef;
    }
}
