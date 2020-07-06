<?php

namespace Upstain\SabreApiClient\Response\Hotel;

class StateProv
{
    private string $stateCode;
    private string $value;

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
