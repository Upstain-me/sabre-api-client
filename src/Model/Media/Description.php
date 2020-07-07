<?php

namespace Upstain\SabreApiClient\Model\Media;

use Upstain\SabreApiClient\Model\Hotel\TextDescriptionItem;

class Description
{
    /**
     * @var null|TextDescriptionItem[]
     */
    private ?array $text;

    /**
     * @param array<string, mixed> $data
     */
    public function __construct(array $data)
    {
        if (isset($data['Text'])) {
            foreach ($data['Text'] as $text) {
                $this->text[] = new TextDescriptionItem($text);
            }
        }
    }

    /**
     * @return null|TextDescriptionItem[]
     */
    public function getText(): ?array
    {
        return $this->text;
    }
}
