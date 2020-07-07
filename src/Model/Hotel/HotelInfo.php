<?php

namespace Upstain\SabreApiClient\Model\Hotel;

use Upstain\SabreApiClient\Model\Location\LocationInfo;
use Upstain\SabreApiClient\Response\Hotel\Amenity;
use Upstain\SabreApiClient\Response\Hotel\PropertyType;

class HotelInfo extends Hotel
{
    private string $hotelName;

    private string $chainCode;

    private string $chainName;

    private string $brandCode;

    private string $brandName;

    private ?float $distance = null;

    private ?string $direction = null;

    private ?string $unitOfMeasure = null;

    private ?string $logo = null;

    private ?string $sabreRating = null;

    private ?int $ordinal = null;

    private ?LocationInfo $locationInfo = null;

    /**
     * @var Amenity[]|null
     */
    private ?array $amenities = null;

    /**
     * @var PropertyType[]|null
     */
    private ?array $propertyTypeInfo = null;

    private ?string $status = null;

    /**
     * @param array<string, mixed> $data
     */
    public function __construct(array $data)
    {
        foreach ($data as $key => $info) {
            if (!\in_array($key, ['LocationInfo', 'Amenities', 'PropertyTypeInfo'])) {
                $this->{\lcfirst($key)} = $info;
            }
        }
        $this->locationInfo = isset($data['LocationInfo']) ? new LocationInfo($data['LocationInfo']) : null;

        if (isset($data['Amenities'])) {
            foreach ($data['Amenities']['Amenity'] as $amenity) {
                $this->amenities[] = new Amenity($amenity);
            }
        }

        if (isset($data['PropertyTypeInfo']['PropertyType'])) {
            foreach ($data['PropertyTypeInfo']['PropertyType'] as $propertyType) {
                $this->propertyTypeInfo[] = new PropertyType($propertyType);
            }
        }

        $this->status = $data['Status'] ?? null;
    }

    /**
     * @return Amenity[]|null
     */
    public function getAmenities(): ?array
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
     * @return LocationInfo|null
     */
    public function getLocationInfo(): ?LocationInfo
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
     * @return float|null
     */
    public function getDistance(): ?float
    {
        return $this->distance;
    }

    /**
     * @return string|null
     */
    public function getDirection(): ?string
    {
        return $this->direction;
    }

    /**
     * @return string|null
     */
    public function getUnitOfMeasure(): ?string
    {
        return $this->unitOfMeasure;
    }

    /**
     * @return string|null
     */
    public function getLogo(): ?string
    {
        return $this->logo;
    }

    /**
     * @return string|null
     */
    public function getSabreRating(): ?string
    {
        return $this->sabreRating;
    }

    /**
     * @return int|null
     */
    public function getOrdinal(): ?int
    {
        return $this->ordinal;
    }

    /**
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
}
