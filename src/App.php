<?php

namespace Upstain\SabreApiClient;

class App
{
    private Prop $prop;


    public function method(): int
    {
        $prop = new Prop(2);
        return $prop->getTest() + 1;
    }
}
