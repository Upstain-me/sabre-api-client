<?php

namespace Upstain\SabreApiClient\Model\Location;

class StateProv
{
    private string $stateCode;
    private string $value;

    /**
     * @param array<string, string> $data
     */
    public function __construct(array $data)
    {
        $this->stateCode = $data['StateCode'];
        $this->value = $data['value'];
    }

    /**
     * @return mixed|string
     */
    public function getStateCode()
    {
        return $this->stateCode;
    }

    /**
     * @return mixed|string
     */
    public function getValue()
    {
        return $this->value;
    }
}
