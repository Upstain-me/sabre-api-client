<?php

namespace Upstain\SabreApiClient\Model\Hotel;

class RateInfoRef
{
    private bool $convertedRateInfoOnly = false;
    private string $currencyCode = 'USD';
    private ?string $bestOnly = null;
    private string $prePaidQualifier = 'IncludePrepaid';

    private StayDateRange $stayDateRange;
    private Rooms $rooms;
    private string $infoSource = '100,110,112,113';

    private ?RatePlanCandidates $ratePlanCandidates = null;

    public function toArray(): array
    {
        $array = [
            'ConvertedRateInfoOnly' => $this->convertedRateInfoOnly,
            'CurrencyCode' => $this->currencyCode,
            'PrepaidQualifier' => $this->prePaidQualifier,
            'StayDateRange' => $this->stayDateRange->toArray(),
            'Rooms' => $this->rooms->toArray(),
            'InfoSource' => $this->infoSource,
        ];

        if ($this->bestOnly) {
            $array['BestOnly'] = $this->bestOnly;
        }

        if ($this->ratePlanCandidates) {
            $array['RatePlanCandidates'] = $this->ratePlanCandidates->toArray();
        }

        return $array;
    }

    /**
     * @param RatePlanCandidates|null $ratePlanCandidates
     */
    public function setRatePlanCandidates(?RatePlanCandidates $ratePlanCandidates): void
    {
        $this->ratePlanCandidates = $ratePlanCandidates;
    }

    /**
     * @param bool $convertedRateInfoOnly
     */
    public function setConvertedRateInfoOnly(bool $convertedRateInfoOnly): void
    {
        $this->convertedRateInfoOnly = $convertedRateInfoOnly;
    }

    /**
     * @param string $currencyCode
     */
    public function setCurrencyCode(string $currencyCode): void
    {
        $this->currencyCode = $currencyCode;
    }

    /**
     * @param string $bestOnly
     */
    public function setBestOnly(string $bestOnly): void
    {
        $this->bestOnly = $bestOnly;
    }

    /**
     * @param string $prePaidQualifier
     */
    public function setPrePaidQualifier(string $prePaidQualifier): void
    {
        $this->prePaidQualifier = $prePaidQualifier;
    }

    /**
     * @param StayDateRange $stayDateRange
     */
    public function setStayDateRange(StayDateRange $stayDateRange): void
    {
        $this->stayDateRange = $stayDateRange;
    }

    /**
     * @param Rooms $rooms
     */
    public function setRooms(Rooms $rooms): void
    {
        $this->rooms = $rooms;
    }

    /**
     * @param string $infoSource
     */
    public function setInfoSource(string $infoSource): void
    {
        $this->infoSource = $infoSource;
    }
}
