<?php

namespace Upstain\SabreApiClient\Model\Hotel;

class Hotel
{
    protected string $hotelCode;

    protected string $codeContext;

    /**
     * @return string
     */
    public function getHotelCode(): string
    {
        return $this->hotelCode;
    }

    /**
     * @param string $hotelCode
     */
    public function setHotelCode(string $hotelCode): void
    {
        $this->hotelCode = $hotelCode;
    }

    /**
     * @return string
     */
    public function getCodeContext(): string
    {
        return $this->codeContext;
    }

    /**
     * @param string $codeContext
     */
    public function setCodeContext(string $codeContext): void
    {
        $this->codeContext = $codeContext;
    }
}
