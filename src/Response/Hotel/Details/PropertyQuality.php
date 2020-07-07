<?php

namespace Upstain\SabreApiClient\Response\Hotel\Details;

class PropertyQuality
{
    private string $code = '';
    private string $description = '';

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
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }
}
