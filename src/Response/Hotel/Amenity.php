<?php

namespace Upstain\SabreApiClient\Response\Hotel;

class Amenity
{
    private string $code;
    private string $description;

    /**
     * @param array<string, string> $data
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
