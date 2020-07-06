<?php

namespace Upstain\SabreApiClient\Request\Hotel\SearchCriteria;

use Upstain\SabreApiClient\Model\SearchInputInterface;

class SearchInput implements SearchInputInterface
{
    private ?\DateTimeInterface $startDate = null;
    private ?\DateTimeInterface $endDate = null;
    private ?string $airportCode = null;

    public function __toString()
    {
        return \implode(
            '_',
            [
                'startDate-' . ($this->startDate ? $this->startDate->getTimestamp() : 'null'),
                'endDate-' . ($this->endDate ? $this->endDate->getTimestamp() : 'null'),
                'airportCode-' . $this->airportCode,
            ]
        );
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->startDate;
    }

    /**
     * @param \DateTimeInterface|null $startDate
     */
    public function setStartDate(?\DateTimeInterface $startDate): void
    {
        $this->startDate = $startDate;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->endDate;
    }

    /**
     * @param \DateTimeInterface|null $endDate
     */
    public function setEndDate(?\DateTimeInterface $endDate): void
    {
        $this->endDate = $endDate;
    }

    /**
     * @return string|null
     */
    public function getAirportCode(): ?string
    {
        return $this->airportCode;
    }

    /**
     * @param string|null $airportCode
     */
    public function setAirportCode(?string $airportCode): void
    {
        $this->airportCode = $airportCode;
    }
}
