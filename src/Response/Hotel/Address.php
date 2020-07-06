<?php

namespace Upstain\SabreApiClient\Response\Hotel;

class Address
{
    private string $addressLine1;
    private ?string $addressLine2;
    private string $postalCode;

    private CityName $cityName;
    private StateProv $stateProv;
    private CountryName $countryName;

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->addressLine1 = $data['AddressLine1'];
        $this->addressLine2 = $data['AddressLine2'] ?? null;
        $this->postalCode = $data['PostalCode'];

        $this->cityName = new CityName($data['CityName']);
        $this->stateProv = new StateProv($data['StateProv']);

        $this->countryName = new CountryName($data['CountryName']);
    }

    /**
     * @return mixed|string
     */
    public function getAddressLine1()
    {
        return $this->addressLine1;
    }

    /**
     * @return mixed|string|null
     */
    public function getAddressLine2()
    {
        return $this->addressLine2;
    }

    /**
     * @return mixed|string
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * @return CityName
     */
    public function getCityName(): CityName
    {
        return $this->cityName;
    }

    /**
     * @return StateProv
     */
    public function getStateProv(): StateProv
    {
        return $this->stateProv;
    }

    /**
     * @return CountryName
     */
    public function getCountryName(): CountryName
    {
        return $this->countryName;
    }
}
