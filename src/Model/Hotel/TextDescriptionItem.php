<?php

namespace Upstain\SabreApiClient\Model\Hotel;

class TextDescriptionItem
{
    private ?string $language;
    private ?string $value;
    private ?string $type;

    /**
     * @param array<string, mixed> $data
     */
    public function __construct(array $data)
    {
        $this->language = $data['Language'] ?? null;
        $this->value = $data['value'] ?? null;
        $this->type = $data['type'] ?? null;
    }

    /**
     * @return null|string
     */
    public function getLanguage(): ?string
    {
        return $this->language;
    }

    /**
     * @return null|string
     */
    public function getValue(): ?string
    {
        return $this->value;
    }

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }
}
