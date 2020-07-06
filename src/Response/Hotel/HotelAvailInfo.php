<?php

namespace Upstain\SabreApiClient\Response\Hotel;

class HotelAvailInfo
{
    /**
     * @var HotelInfo
     */
    private HotelInfo $hotelInfo;

    /**
     * @var HotelImageInfo
     */
    private ?HotelImageInfo $hotelImageInfo;

    /**
     * @param array<string, mixed> $hotelInfo
     * @param array<string, mixed> $hotelImageInfo
     */
    public function __construct(array $hotelInfo, ?array $hotelImageInfo = null)
    {
        $this->hotelInfo = new HotelInfo($hotelInfo);
        $this->hotelImageInfo = $hotelImageInfo ? new HotelImageInfo($hotelImageInfo) : null;
    }

    /**
     * @return HotelInfo
     */
    public function getHotelInfo(): HotelInfo
    {
        return $this->hotelInfo;
    }

    /**
     * @return HotelImageInfo|null
     */
    public function getHotelImageInfo(): ?HotelImageInfo
    {
        return $this->hotelImageInfo;
    }
}
