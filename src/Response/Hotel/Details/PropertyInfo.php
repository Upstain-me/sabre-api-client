<?php

namespace Upstain\SabreApiClient\Response\Hotel\Details;

class PropertyInfo
{
    private string $floors;
    private string $rooms;

    /**
     * @var Policy[]|null
     */
    private ?array $policies;

    /**
     * @var PropertyQuality[]|null
     */
    private ?array $propertyQualityInfo;

    /**
     * @param array<string, mixed> $data
     */
    public function __construct(array $data)
    {
        foreach ($data as $key => $info) {
            if (!\in_array($key, ['Policies', 'PropertyQualityInfo'])) {
                $this->{\lcfirst($key)} = $info;
            }
        }

        if (isset($data['Policies']['Policy'])) {
            foreach ($data['Policies']['Policy'] as $policy) {
                $this->policies[] = new Policy($policy);
            }
        }

        if (isset($data['PropertyQualityInfo']['PropertyQuality'])) {
            foreach ($data['PropertyQualityInfo']['PropertyQuality'] as $propertyQuality) {
                $this->propertyQualityInfo[] = new PropertyQuality($propertyQuality);
            }
        }
    }

    /**
     * @return string
     */
    public function getFloors(): string
    {
        return $this->floors;
    }

    /**
     * @return string
     */
    public function getRooms(): string
    {
        return $this->rooms;
    }

    /**
     * @return Policy[]|null
     */
    public function getPolicies(): ?array
    {
        return $this->policies;
    }

    /**
     * @return PropertyQuality[]|null
     */
    public function getPropertyQualityInfo(): ?array
    {
        return $this->propertyQualityInfo;
    }
}
