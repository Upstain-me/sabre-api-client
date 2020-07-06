<?php

namespace Upstain\SabreApiClient\Tests\Unit;

use Upstain\SabreApiClient\Response\Hotel\HotelAvailInfos;
use Codeception\Test\Unit;

class HotelAvailabilityResponseTest extends Unit
{
    public function testFromRawResponse()
    {
        $response = \json_decode(
            \file_get_contents(__DIR__.'/../../_data/sabre/response.json'),
            true,
            512,
            JSON_THROW_ON_ERROR
        );

        $actual = new HotelAvailInfos($response);
        $this->assertEquals(359, $actual->getMaxSearchResults());
        $this->assertEquals('Grand Hyatt Dfw', $actual->getHotelAvailInfo()[0]->getHotelInfo()->getHotelName());
        $this->assertEquals('32.897506', $actual->getHotelAvailInfo()[0]->getHotelInfo()->getLocationInfo()->getLatitude());
        $this->assertEquals('2337 South International Pkwy', $actual->getHotelAvailInfo()[0]->getHotelInfo()->getLocationInfo()->getAddress()->getAddressLine1());
        $this->assertCount(22, $actual->getHotelAvailInfo()[0]->getHotelInfo()->getAmenities());
        $this->assertEquals('356471', $actual->getHotelAvailInfo()[0]->getHotelImageInfo()->getId());
    }
}
