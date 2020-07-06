<?php

namespace Upstain\SabreApiClient\Response\Hotel\Image;

class Image
{
    private string $url;
    private string $type;
    private string $height;
    private string $weight;

    /**
     * @param array<string, mixed> $data
     */
    public function __construct(array $data)
    {
        foreach ($data as $key => $info) {
            $this->{\lcfirst($key)} = $info;
        }
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getHeight(): string
    {
        return $this->height;
    }

    /**
     * @return string
     */
    public function getWeight(): string
    {
        return $this->weight;
    }
}
