<?php

namespace Upstain\SabreApiClient;

class Prop
{
    private int $test = 0;

    /**
     * @param int $test
     */
    public function __construct(int $test)
    {
        $this->test = $test;
    }

    /**
     * @return int
     */
    public function getTest(): int
    {
        return $this->test;
    }

    /**
     * @param int $test
     */
    public function setTest(int $test): void
    {
        $this->test = $test;
    }
}
