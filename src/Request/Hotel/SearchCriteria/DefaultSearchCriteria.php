<?php

namespace Upstain\SabreApiClient\Request\Hotel\SearchCriteria;

use Upstain\SabreApiClient\Model\DefaultSearchCriteriaInterface;
use Upstain\SabreApiClient\Model\Hotel\RateInfoRef;
use Upstain\SabreApiClient\Model\Hotel\Room;
use Upstain\SabreApiClient\Model\Hotel\Rooms;
use Upstain\SabreApiClient\Model\Hotel\StayDateRange;
use Upstain\SabreApiClient\Model\SearchInputInterface;

class DefaultSearchCriteria implements DefaultSearchCriteriaInterface
{
    /**
     * @var SearchCriteria
     */
    private SearchCriteria $searchCriteria;

    public function build(): array
    {
        // GeoSearch
        $refPoint = new RefPoint();
        $geoRef = new GeoRef();
        $geoRef->setRefPoint($refPoint);

        $geoSearch = new GeoSearch();
        $geoSearch->setGeoRef($geoRef);

        // RateInfoRef
        $stayDateRange = new StayDateRange();
        $now = new \DateTime();
        $tomorrow = new \DateTime('+1 day');
        $stayDateRange->setStartDate($now);
        $stayDateRange->setEndDate($tomorrow);

        $roomData = [
            [
                'Index' => 1,
                'Adults' => 1,
                'Children' => 0,
            ],
        ];

        $room = new Room();
        $room->setData($roomData);

        $rooms = new Rooms();
        $rooms->setRoom($room);

        $rateInfoRef = new RateInfoRef();
        $rateInfoRef->setStayDateRange($stayDateRange);
        $rateInfoRef->setRooms($rooms);
        $rateInfoRef->setBestOnly('2');

        // HotelPref

        $sabreRating = new SabreRating();
        $sabreRating->setMin('3');
        $sabreRating->setMax('5');

        $hotelPref = new HotelPref();
        $hotelPref->setSaberRating($sabreRating);

        // ImageRef
        $imageRef = new ImageRef();

        $this->searchCriteria = new SearchCriteria();
        $this->searchCriteria->setGeoSearch($geoSearch);
        $this->searchCriteria->setRateInfoRef($rateInfoRef);
        $this->searchCriteria->setHotelPref($hotelPref);
        $this->searchCriteria->setImageRef($imageRef);

        return $this->searchCriteria->toArray();
    }

    public function override(SearchInputInterface $searchInput): array
    {
        $searchCriteria = $this->searchCriteria->toArray();

        if ($searchInput->getStartDate()) {
            $searchCriteria['RateInfoRef']['StayDateRange']['StartDate'] = $searchInput->getStartDate()->format('Y-m-d');
        }

        if ($searchInput->getEndDate()) {
            $searchCriteria['RateInfoRef']['StayDateRange']['EndDate'] = $searchInput->getEndDate()->format('Y-m-d');
        }

        if ($searchInput->getAirportCode()) {
            $searchCriteria['GeoSearch']['GeoRef']['RefPoint']['Value'] = $searchInput->getAirportCode();
        }

        return $searchCriteria;
    }

    /**
     * @return SearchCriteria
     */
    public function getSearchCriteria(): SearchCriteria
    {
        return $this->searchCriteria;
    }
}
