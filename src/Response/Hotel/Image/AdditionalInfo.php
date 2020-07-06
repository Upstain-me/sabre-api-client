<?php

namespace Upstain\SabreApiClient\Response\Hotel\Image;

class AdditionalInfo
{
    private string $type;

    private Description $description;

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->type = $data['Type'];
        $this->description = new Description($data['Description']);
    }

    /**
     * @return mixed|string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return Description
     */
    public function getDescription(): Description
    {
        return $this->description;
    }
}
