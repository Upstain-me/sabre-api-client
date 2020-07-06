<?php

namespace Upstain\SabreApiClient\Response\Hotel;

class LocationInfo
{
    private string $latitude;
    private string $longitude;

    private Address $address;
    private Contact $contact;

    /**
     * @param array<string, mixed> $data
     */
    public function __construct(array $data)
    {
        $this->latitude = $data['Latitude'];
        $this->longitude = $data['Longitude'];
        $this->address = new Address($data['Address']);
        $this->contact = new Contact($data['Contact']);
    }

    /**
     * @return Address
     */
    public function getAddress(): Address
    {
        return $this->address;
    }

    /**
     * @return mixed|string
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @return mixed|string
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @return Contact
     */
    public function getContact(): Contact
    {
        return $this->contact;
    }
}
