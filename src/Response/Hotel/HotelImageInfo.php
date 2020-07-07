<?php

namespace Upstain\SabreApiClient\Response\Hotel;

use Upstain\SabreApiClient\Model\Media\Image;
use Upstain\SabreApiClient\Model\Media\MediaItem;

class HotelImageInfo extends MediaItem
{
    private Image $image;

    /**
     * @param array<string, mixed> $data
     * @throws \Exception
     */
    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->image = new Image($data['Image']);
    }

    /**
     * @return Image
     */
    public function getImage(): Image
    {
        return $this->image;
    }
}
