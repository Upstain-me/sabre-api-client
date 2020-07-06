<?php

namespace Upstain\SabreApiClient\Response\Hotel;

class Contact
{
    private string $phone = '';
    private string $fax = '';
    private string $email = '';

    public function __construct($data)
    {
        foreach ($data as $key => $info) {
            $this->{\lcfirst($key)} = $info;
        }
    }
}
