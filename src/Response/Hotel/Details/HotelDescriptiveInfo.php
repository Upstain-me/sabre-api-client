<?php

namespace Upstain\SabreApiClient\Response\Hotel\Details;

use Upstain\SabreApiClient\Model\Location\LocationInfo;
use Upstain\SabreApiClient\Response\Hotel\Amenity;

class HotelDescriptiveInfo
{
    private ?LocationInfo $locationInfo = null;

    /**
     * @var Amenity[]|null
     */
    private ?array $amenities = null;

    /**
     * @var Description[]|null
     */
    private ?array $descriptions = null;

    /**
     * TODO I don't actually know what this is, so it needs checking.
     *
     * @var array<string, mixed>|null
     */
    private ?array $airports = [];

    private PropertyInfo $propertyInfo;

    /**
     * @param array<string, mixed> $data
     */
    public function __construct(array $data)
    {
        $this->locationInfo = isset($data['LocationInfo']) ? new LocationInfo($data['LocationInfo']) : null;

        if (isset($data['Amenities']['Amenity'])) {
            foreach ($data['Amenities']['Amenity'] as $amenity) {
                $this->amenities[] = new Amenity($amenity);
            }
        }

        if (isset($data['Descriptions']['Description'])) {
            foreach ($data['Descriptions']['Description'] as $description) {
                $this->descriptions[] = new Description($description);
            }
        }

        $this->propertyInfo = new PropertyInfo($data['PropertyInfo']);
    }

    /**
     * @return PropertyInfo
     */
    public function getPropertyInfo(): PropertyInfo
    {
        return $this->propertyInfo;
    }

    /**
     * @return LocationInfo|null
     */
    public function getLocationInfo(): ?LocationInfo
    {
        return $this->locationInfo;
    }

    /**
     * @return Amenity[]|null
     */
    public function getAmenities(): ?array
    {
        return $this->amenities;
    }

    /**
     * @return Description[]|null
     */
    public function getDescriptions(): ?array
    {
        return $this->descriptions;
    }

    /**
     * @return array<string, mixed>|null
     */
    public function getAirports(): ?array
    {
        return $this->airports;
    }
}
