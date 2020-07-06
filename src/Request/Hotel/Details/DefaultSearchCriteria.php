<?php

namespace Upstain\SabreApiClient\Request\Hotel\Details;

use Upstain\SabreApiClient\Model\DefaultSearchCriteriaInterface;
use Upstain\SabreApiClient\Model\Hotel\RateInfoRef;
use Upstain\SabreApiClient\Model\Hotel\RatePlanCandidates;
use Upstain\SabreApiClient\Model\Hotel\Room;
use Upstain\SabreApiClient\Model\Hotel\Rooms;
use Upstain\SabreApiClient\Model\Hotel\StayDateRange;
use Upstain\SabreApiClient\Model\SearchInputInterface;

class DefaultSearchCriteria implements DefaultSearchCriteriaInterface
{
    private SearchCriteria $searchCriteria;

    public function build(): array
    {
        $this->searchCriteria = new SearchCriteria();

        $hotelRef = new HotelRef();
        $hotelRef->setCodeContext('GLOBAL');
        $hotelRef->setHotelCode('100148572');
        $this->searchCriteria->setHotelRefs([$hotelRef]);

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
        $ratePlanCand = new RatePlanCandidates();
        $rateInfoRef->setRatePlanCandidates($ratePlanCand);

        $this->searchCriteria->setRateInfoRef($rateInfoRef);

        // HotelContentRef
        $hotelContentRef = new HotelContentRef();
        $descriptiveInfo = new DescriptiveInfoRef();
        $descriptions = new Descriptions();
        $descriptiveInfo->setDescriptions($descriptions);
        $hotelContentRef->setDescriptiveInfoRef($descriptiveInfo);
        $mediaRef = new MediaRef();
        $hotelContentRef->setMediaRef($mediaRef);

        $this->searchCriteria->setHotelContentRef($hotelContentRef);

        return $this->searchCriteria->toArray();
    }

    public function override(SearchInputInterface $searchInput): array
    {
        $searchCriteria = $this->searchCriteria->toArray();

        if ($searchInput->getHotelCode()) {
            $searchCriteria['HotelRefs']['HotelRef']['HotelCode'] = $searchInput->getHotelCode();
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
