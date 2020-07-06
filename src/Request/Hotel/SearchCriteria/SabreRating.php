<?php

namespace Upstain\SabreApiClient\Request\Hotel\SearchCriteria;

class SabreRating
{
    private string $min;
    private string $max;

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'Min' => $this->min,
            'Max' => $this->max
        ];
    }

    /**
     * @param string $min
     */
    public function setMin(string $min): void
    {
        $this->min = $min;
    }

    /**
     * @param string $max
     */
    public function setMax(string $max): void
    {
        $this->max = $max;
    }
}
