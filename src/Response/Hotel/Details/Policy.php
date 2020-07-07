<?php

namespace Upstain\SabreApiClient\Response\Hotel\Details;

use Upstain\SabreApiClient\Model\Hotel\TextDescriptionItem;

class Policy
{
    /**
     * @var TextDescriptionItem|null
     */
    private ?TextDescriptionItem $text;

    /**
     * @param array<string, mixed> $data
     */
    public function __construct(array $data)
    {
        $this->text = isset($data['Text']) ? new TextDescriptionItem($data['Text']) : null;
    }

    /**
     * @return TextDescriptionItem|null
     */
    public function getText(): ?TextDescriptionItem
    {
        return $this->text;
    }
}
