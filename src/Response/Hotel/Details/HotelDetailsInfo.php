<?php

namespace Upstain\SabreApiClient\Response\Hotel\Details;

use Upstain\SabreApiClient\Model\Hotel\HotelInfo;

class HotelDetailsInfo
{
    private HotelInfo $hotelInfo;
    private HotelDescriptiveInfo $hotelDescriptiveInfo;
    private HotelMediaInfo $hotelMediaInfo;

    /**
     * @param array<string, mixed> $data
     */
    public function __construct(array $data)
    {
        $this->hotelInfo = new HotelInfo($data['HotelInfo']);
        $this->hotelDescriptiveInfo = new HotelDescriptiveInfo($data['HotelDescriptiveInfo']);
        $this->hotelMediaInfo = new HotelMediaInfo($data['HotelMediaInfo']);
    }

    /**
     * @return HotelInfo
     */
    public function getHotelInfo(): HotelInfo
    {
        return $this->hotelInfo;
    }

    /**
     * @return HotelDescriptiveInfo
     */
    public function getHotelDescriptiveInfo(): HotelDescriptiveInfo
    {
        return $this->hotelDescriptiveInfo;
    }

    /**
     * @return HotelMediaInfo
     */
    public function getHotelMediaInfo(): HotelMediaInfo
    {
        return $this->hotelMediaInfo;
    }
}
