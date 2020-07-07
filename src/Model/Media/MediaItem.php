<?php

namespace Upstain\SabreApiClient\Model\Media;

class MediaItem
{
    protected string $id;
    protected int $ordinal;
    protected string $format;
    protected \DateTimeInterface $lastModifiedDate;

    protected Category $category;

    /**
     * @var AdditionalInfo[]
     */
    protected array $additionalInfo;

    /**
     * @param array<string, mixed> $data
     * @throws \Exception
     */
    public function __construct(array $data)
    {
        $this->id = $data['Id'];
        $this->ordinal = $data['Ordinal'];
        $this->format = $data['Format'];
        $this->lastModifiedDate = new \DateTimeImmutable($data['LastModifedDate']);

        $this->category = new Category($data['Category']);

        foreach ($data['AdditionalInfo']['Info'] as $info) {
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
