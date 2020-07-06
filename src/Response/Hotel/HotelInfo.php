<?php

namespace Upstain\SabreApiClient\Response\Hotel;

use Upstain\SabreApiClient\Model\Hotel\Hotel;

class HotelInfo extends Hotel
{
    private string $hotelName;

    private string $chainCode;

    private string $chainName;

    private string $brandCode;

    private string $brandName;

    private float $distance;

    private string $direction;

    private string $unitOfMeasure;

    private string $logo;

    private string $sabreRating;

    private int $ordinal;

    private LocationInfo $locationInfo;

    /**
     * @var Amenity[]
     */
    private array $amenities;

    /**
     * @var PropertyType[]
     */
    private ?array $propertyTypeInfo = null;

    /**
     * @param array $hotelInfo
     */
    public function __construct(array $hotelInfo)
    {
        foreach ($hotelInfo as $key => $info) {
            if (!\in_array($key, ['LocationInfo', 'Amenities', 'PropertyTypeInfo'])) {
                $this->{\lcfirst($key)} = $info;
            }
        }
        $this->locationInfo = new LocationInfo($hotelInfo['LocationInfo']);
        foreach ($hotelInfo['Amenities']['Amenity'] as $amenity) {
            $this->amenities[] = new Amenity($amenity);
        }
        if (isset($hotelInfo['PropertyTypeInfo']['PropertyType'] )) {
            foreach ($hotelInfo['PropertyTypeInfo']['PropertyType'] as $propertyType) {
                $this->propertyTypeInfo[] = new PropertyType($propertyType);
            }
        }
    }

    /**
     * @return Amenity[]
     */
    public function getAmenities(): array
    {
        return $this->amenities;
    }

    /**
     * @return PropertyType[]|null
     */
    public function getPropertyTypeInfo(): ?array
    {
        return $this->propertyTypeInfo;
    }

    /**
     * @return LocationInfo
     */
    public function getLocationInfo(): LocationInfo
    {
        return $this->locationInfo;
    }

    /**
     * @return string
     */
    public function getHotelName(): string
    {
        return $this->hotelName;
    }

    /**
     * @return string
     */
    public function getChainCode(): string
    {
        return $this->chainCode;
    }

    /**
     * @return string
     */
    public function getChainName(): string
    {
        return $this->chainName;
    }

    /**
     * @return string
     */
    public function getBrandCode(): string
    {
        return $this->brandCode;
    }

    /**
     * @return string
     */
    public function getBrandName(): string
    {
        return $this->brandName;
    }

    /**
     * @return float
     */
    public function getDistance(): float
    {
        return $this->distance;
    }

    /**
     * @return string
     */
    public function getDirection(): string
    {
        return $this->direction;
    }

    /**
     * @return string
     */
    public function getUnitOfMeasure(): string
    {
        return $this->unitOfMeasure;
    }

    /**
     * @return string
     */
    public function getLogo(): string
    {
        return $this->logo;
    }

    /**
     * @return string
     */
    public function getSabreRating(): string
    {
        return $this->sabreRating;
    }

    /**
     * @return int
     */
    public function getOrdinal(): int
    {
        return $this->ordinal;
    }
}
