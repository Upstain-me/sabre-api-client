<?php

namespace Upstain\SabreApiClient\Request\Hotel\SearchCriteria;

class GeoRef
{
    private int $radius = 50;
    private string $unitOfMeasure = 'MI';
    private RefPoint $refPoint;

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'Radius' => $this->radius,
            'UOM' => $this->unitOfMeasure,
            'RefPoint' => $this->refPoint->toArray(),
        ];
    }

    /**
     * @param int $radius
     */
    public function setRadius(int $radius): void
    {
        $this->radius = $radius;
    }

    /**
     * @param string $unitOfMeasure
     */
    public function setUnitOfMeasure(string $unitOfMeasure): void
    {
        $this->unitOfMeasure = $unitOfMeasure;
    }

    /**
     * @param RefPoint $refPoint
     */
    public function setRefPoint(RefPoint $refPoint): void
    {
        $this->refPoint = $refPoint;
    }
}
