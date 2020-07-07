<?php

namespace Upstain\SabreApiClient\Response\Hotel\Details\Media;

use Upstain\SabreApiClient\Model\Media\Image;

class MediaItem extends \Upstain\SabreApiClient\Model\Media\MediaItem
{
    /**
     * @var Image[]|null
     */
    private ?array $imageItems;

    /**
     * @param array<string, mixed> $data
     * @throws \Exception
     */
    public function __construct($data)
    {
        parent::__construct($data);

        if (isset($data['ImageItems']['Image'])) {
            foreach ($data['ImageItems']['Image'] as $imageItem) {
                $this->imageItems[] = new Image($imageItem);
            }
        }
    }

    /**
     * @return Image[]|null
     */
    public function getImageItems(): ?array
    {
        return $this->imageItems;
    }
}
