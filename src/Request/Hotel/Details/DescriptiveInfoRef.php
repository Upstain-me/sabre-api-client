<?php

namespace Upstain\SabreApiClient\Request\Hotel\Details;

class DescriptiveInfoRef
{
    private bool $propertyInfo = true;
    private bool $locationInfo = true;
    private bool $amenities = true;
    private bool $additionalCharges = true;
    private bool $pointOfInterests = true;
    private bool $airports = true;
    private bool $acceptedCreditCards = true;
    private bool $guaranteePolicies = true;

    private Descriptions $descriptions;

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'PropertyInfo' => $this->propertyInfo,
            'LocationInfo' => $this->locationInfo,
            'Amenities' => $this->amenities,
            'AdditionalCharges' => $this->additionalCharges,
            'Descriptions' => $this->descriptions->toArray(),
            'PointOfInterests' => $this->pointOfInterests,
            'Airports' => $this->airports,
            'AcceptedCreditCards' => $this->acceptedCreditCards,
            'GuaranteePolicies' => $this->guaranteePolicies,
        ];
    }

    /**
     * @param bool $propertyInfo
     */
    public function setPropertyInfo(bool $propertyInfo): void
    {
        $this->propertyInfo = $propertyInfo;
    }

    /**
     * @param bool $locationInfo
     */
    public function setLocationInfo(bool $locationInfo): void
    {
        $this->locationInfo = $locationInfo;
    }

    /**
     * @param bool $amenities
     */
    public function setAmenities(bool $amenities): void
    {
        $this->amenities = $amenities;
    }

    /**
     * @param bool $additionalCharges
     */
    public function setAdditionalCharges(bool $additionalCharges): void
    {
        $this->additionalCharges = $additionalCharges;
    }

    /**
     * @param bool $pointOfInterests
     */
    public function setPointOfInterests(bool $pointOfInterests): void
    {
        $this->pointOfInterests = $pointOfInterests;
    }

    /**
     * @param bool $airports
     */
    public function setAirports(bool $airports): void
    {
        $this->airports = $airports;
    }

    /**
     * @param bool $acceptedCreditCards
     */
    public function setAcceptedCreditCards(bool $acceptedCreditCards): void
    {
        $this->acceptedCreditCards = $acceptedCreditCards;
    }

    /**
     * @param bool $guaranteePolicies
     */
    public function setGuaranteePolicies(bool $guaranteePolicies): void
    {
        $this->guaranteePolicies = $guaranteePolicies;
    }

    /**
     * @param Descriptions $descriptions
     */
    public function setDescriptions(Descriptions $descriptions): void
    {
        $this->descriptions = $descriptions;
    }
}
