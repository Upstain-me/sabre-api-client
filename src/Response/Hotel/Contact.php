<?php

namespace Upstain\SabreApiClient\Response\Hotel;

class Contact
{
    private string $phone = '';
    private string $fax = '';
    private string $email = '';

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
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @return string
     */
    public function getFax(): string
    {
        return $this->fax;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }
}
