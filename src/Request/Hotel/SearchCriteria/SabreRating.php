<?php

namespace Upstain\SabreApiClient\Request\Hotel\SearchCriteria;

class SabreRating
{
    private string $min;
    private string $max;

    public function toArray()
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
