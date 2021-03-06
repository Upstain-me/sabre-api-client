<?php

namespace Upstain\SabreApiClient\Model\Location;

class CityName
{
    private string $cityCode;
    private string $value;

    /**
     * @param array<string, string> $data
     */
    public function __construct(array $data)
    {
        $this->cityCode = $data['CityCode'];
        $this->value = $data['value'];
    }

    /**
     * @return string
     */
    public function getCityCode(): string
    {
        return $this->cityCode;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }
}
