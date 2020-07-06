<?php

namespace Upstain\SabreApiClient\Response\Hotel\Image;

class TextDescriptionItem
{
    private ?string $language;
    private ?string $value;

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->language = $data['Language'] ?? null;
        $this->value = $data['value'] ?? null;
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
}
