<?php

namespace Upstain\SabreApiClient\Model\Location;

class CountryName
{
    private string $code;
    private string $value;

    /**
     * @param array<string, mixed> $data
     */
    public function __construct(array $data)
    {
        $this->code = $data['Code'];
        $this->value = $data['value'];
    }

    /**
     * @return mixed|string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @return mixed|string
     */
    public function getValue()
    {
        return $this->value;
    }
}
