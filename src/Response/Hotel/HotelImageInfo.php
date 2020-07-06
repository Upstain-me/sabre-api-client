<?php

namespace Upstain\SabreApiClient\Response\Hotel;

use Upstain\SabreApiClient\Response\Hotel\Image\AdditionalInfo;
use Upstain\SabreApiClient\Response\Hotel\Image\Category;
use Upstain\SabreApiClient\Response\Hotel\Image\Image;

class HotelImageInfo
{
    private string $id;
    private int $ordinal;
    private string $format;
    private \DateTimeInterface $lastModifiedDate;
    private Image $image;

    private Category $category;

    /**
     * @var AdditionalInfo[]
     */
    private array $additionalInfo;

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->id = $data['ImageItem']['Id'];
        $this->ordinal = $data['ImageItem']['Ordinal'];
        $this->format = $data['ImageItem']['Format'];
        $this->lastModifiedDate = new \DateTimeImmutable($data['ImageItem']['LastModifedDate']);

        $this->image = new Image($data['ImageItem']['Image']);

        $this->category = new Category($data['ImageItem']['Category']);

        foreach ($data['ImageItem']['AdditionalInfo']['Info'] as $info) {
            $this->additionalInfo[] = new AdditionalInfo($info);
        }
    }

    /**
     * @return mixed|string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int|mixed
     */
    public function getOrdinal()
    {
        return $this->ordinal;
    }

    /**
     * @return mixed|string
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * @return \DateTimeImmutable|\DateTimeInterface
     */
    public function getLastModifiedDate()
    {
        return $this->lastModifiedDate;
    }

    /**
     * @return Image
     */
    public function getImage(): Image
    {
        return $this->image;
    }

    /**
     * @return Category
     */
    public function getCategory(): Category
    {
        return $this->category;
    }

    /**
     * @return AdditionalInfo[]
     */
    public function getAdditionalInfo(): array
    {
        return $this->additionalInfo;
    }
}
