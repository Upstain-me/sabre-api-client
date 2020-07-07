<?php

namespace Upstain\SabreApiClient\Request\Hotel\SearchCriteria;

use Upstain\SabreApiClient\Model\Hotel\RateInfoRef;

class SearchCriteria
{
    private int $offset = 1;
    private string $sortBy = 'TotalRate';
    private string $sortOrder = 'DESC';
    private int $pageSize = 20;
    private bool $tierLabels = false;
    private GeoSearch $geoSearch;
    private RateInfoRef $rateInfoRef;
    private HotelPref $hotelPref;
    private ImageRef $imageRef;

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'OffSet' => $this->offset,
            'SortBy' => $this->sortBy,
            'SortOrder' => $this->sortOrder,
            'PageSize' => $this->pageSize,
            'TierLabels' => $this->tierLabels,
            'GeoSearch' => $this->geoSearch->toArray(),
            'RateInfoRef' => $this->rateInfoRef->toArray(),
            'HotelPref' => $this->hotelPref->toArray(),
            'ImageRef' => $this->imageRef->toArray(),
        ];
    }

    /**
     * @param int $offset
     */
    public function setOffset(int $offset): void
    {
        $this->offset = $offset;
    }

    /**
     * @param string $sortBy
     */
    public function setSortBy(string $sortBy): void
    {
        $this->sortBy = $sortBy;
    }

    /**
     * @param string $sortOrder
     */
    public function setSortOrder(string $sortOrder): void
    {
        $this->sortOrder = $sortOrder;
    }

    /**
     * @param int $pageSize
     */
    public function setPageSize(int $pageSize): void
    {
        $this->pageSize = $pageSize;
    }

    /**
     * @param bool $tierLabels
     */
    public function setTierLabels(bool $tierLabels): void
    {
        $this->tierLabels = $tierLabels;
    }

    /**
     * @param GeoSearch $geoSearch
     */
    public function setGeoSearch(GeoSearch $geoSearch): void
    {
        $this->geoSearch = $geoSearch;
    }

    /**
     * @param RateInfoRef $rateInfoRef
     */
    public function setRateInfoRef(RateInfoRef $rateInfoRef): void
    {
        $this->rateInfoRef = $rateInfoRef;
    }

    /**
     * @param HotelPref $hotelPref
     */
    public function setHotelPref(HotelPref $hotelPref): void
    {
        $this->hotelPref = $hotelPref;
    }

    /**
     * @param ImageRef $imageRef
     */
    public function setImageRef(ImageRef $imageRef): void
    {
        $this->imageRef = $imageRef;
    }
}
