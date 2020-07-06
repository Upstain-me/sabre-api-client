<?php

namespace Upstain\SabreApiClient\Response\Hotel;

class CityName
{
    private string $cityCode;
    private string $value;

    /**
     * @param string $cityCode
     * @param string $value
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
