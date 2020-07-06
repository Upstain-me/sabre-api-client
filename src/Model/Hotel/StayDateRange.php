<?php

namespace Upstain\SabreApiClient\Model\Hotel;

class StayDateRange
{
    private \DateTimeInterface $startDate;
    private \DateTimeInterface $endDate;

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'StartDate' => $this->startDate->format('Y-m-d'),
            'EndDate' => $this->endDate->format('Y-m-d'),
        ];
    }

    /**
     * @param \DateTimeInterface $startDate
     */
    public function setStartDate(\DateTimeInterface $startDate): void
    {
        $this->startDate = $startDate;
    }

    /**
     * @param \DateTimeInterface $endDate
     */
    public function setEndDate(\DateTimeInterface $endDate): void
    {
        $this->endDate = $endDate;
    }
}
