<?php

namespace Upstain\SabreApiClient\Response\Hotel;

class HotelAvailInfos
{
    private int $offset;
    private int $maxSearchResults;
    private string $shopKey;

    /**
     * @var HotelAvailInfo[]
     */
    private array $hotelAvailInfo;

    /**
     * HotelAvailInfos constructor.
     */
    public function __construct(array $response)
    {
        $this->offset = $response['GetHotelAvailRS']['HotelAvailInfos']['OffSet'];
        $this->maxSearchResults = $response['GetHotelAvailRS']['HotelAvailInfos']['MaxSearchResults'];
        $this->shopKey = $response['GetHotelAvailRS']['HotelAvailInfos']['ShopKey'];

        foreach ($response['GetHotelAvailRS']['HotelAvailInfos']['HotelAvailInfo'] as $hotelAvailInfo) {
            $this->hotelAvailInfo[] = new HotelAvailInfo($hotelAvailInfo['HotelInfo'], $hotelAvailInfo['HotelImageInfo'] ?? null);
        }
    }

    /**
     * @return int
     */
    public function getOffset(): int
    {
        return $this->offset;
    }

    /**
     * @return int
     */
    public function getMaxSearchResults(): int
    {
        return $this->maxSearchResults;
    }

    /**
     * @return string
     */
    public function getShopKey(): string
    {
        return $this->shopKey;
    }

    /**
     * @return HotelAvailInfo[]
     */
    public function getHotelAvailInfo(): array
    {
        return $this->hotelAvailInfo;
    }
}
