<?php

namespace Upstain\SabreApiClient\Response\Hotel\Details;

use Upstain\SabreApiClient\Response\Hotel\Details\Media\MediaItem;

class HotelMediaInfo
{
    /**
     * @var MediaItem[]|null
     */
    private ?array $mediaItems;

    /**
     * @param array<string, mixed> $data
     * @throws \Exception
     */
    public function __construct(array $data)
    {
        if (isset($data['MediaItems']['MediaItem'])) {
            foreach ($data['MediaItems']['MediaItem'] as $mediaItem) {
                $this->mediaItems[] = new MediaItem($mediaItem);
            }
        }
    }

    /**
     * @return MediaItem[]|null
     */
    public function getMediaItems(): ?array
    {
        return $this->mediaItems;
    }
}
