<?php

namespace Upstain\SabreApiClient\Response\Hotel\Image;

class Description
{
    /**
     * @var null|TextDescriptionItem[]
     */
    private ?array $text;

    /**
     * @param array $data
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
