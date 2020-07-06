<?php

namespace Upstain\SabreApiClient\Request\Hotel\SearchCriteria;

class ImageRef
{
    private string $type = 'MEDIUM';
    private string $languageCode = 'EN';

    /**
     * @return array<string, string>
     */
    public function toArray(): array
    {
        return [
            'Type' => $this->type,
            'LanguageCode' => $this->languageCode,
        ];
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @param string $languageCode
     */
    public function setLanguageCode(string $languageCode): void
    {
        $this->languageCode = $languageCode;
    }
}
