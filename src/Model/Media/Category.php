<?php

namespace Upstain\SabreApiClient\Model\Media;

class Category
{
    private ?string $categoryCode;
    private ?Description $description;

    /**
     * @param array<string, mixed> $data
     */
    public function __construct(array $data)
    {
        $this->categoryCode = $data['CategoryCode'] ?? null;
        $this->description = isset($data['Description']) ? new Description($data['Description']) : null;
    }

    /**
     * @return null|string
     */
    public function getCategoryCode(): ?string
    {
        return $this->categoryCode;
    }

    /**
     * @return null|Description
     */
    public function getDescription(): ?Description
    {
        return $this->description;
    }
}
