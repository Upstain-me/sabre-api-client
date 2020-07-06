<?php

namespace Upstain\SabreApiClient;

class App
{
    public function method(): int
    {
        $prop = new Prop(2);
        return $prop->getTest() + 1;
    }
}
