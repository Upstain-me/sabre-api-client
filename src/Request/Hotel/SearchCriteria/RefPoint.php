<?php

namespace Upstain\SabreApiClient\Request\Hotel\SearchCriteria;

class RefPoint
{
    private string $value = 'DFW';
    private string $valueContext = 'CODE';
    private string $refPointType = '6';

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'Value' => $this->value,
            'ValueContext' => $this->valueContext,
            'RefPointType' => $this->refPointType,
        ];
    }

    /**
     * @param string $value
     */
    public function setValue(string $value): void
    {
        $this->value = $value;
    }

    /**
     * @param string $valueContext
     */
    public function setValueContext(string $valueContext): void
    {
        $this->valueContext = $valueContext;
    }

    /**
     * @param string $refPointType
     */
    public function setRefPointType(string $refPointType): void
    {
        $this->refPointType = $refPointType;
    }
}
