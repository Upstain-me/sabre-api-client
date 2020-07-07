<?php

namespace Upstain\SabreApiClient\Model\Hotel;

class Room
{
    /**
     * @var array<int, mixed>
     */
    private array $data;

    /**
     * @return array<int, mixed>
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @param array<int, mixed> $data
     */
    public function setData(array $data): void
    {
        $this->data = $data;
    }
}
