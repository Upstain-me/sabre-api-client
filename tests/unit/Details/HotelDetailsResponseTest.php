<?php

namespace Upstain\SabreApiClient\Tests\Unit\Details;

use Codeception\Test\Unit;
use Upstain\SabreApiClient\Response\Hotel\Details\HotelDetailsResponse;

class HotelDetailsResponseTest extends Unit
{
    public function testFromRawResponse()
    {
        $response = \json_decode(
            \file_get_contents(__DIR__ . '/../../_data/detailsResponse.json'),
            true,
            512,
            JSON_THROW_ON_ERROR
        );

        $actual = (new HotelDetailsResponse($response))->fromRawResponse();

        $this->assertEquals('Sheraton Ft Worth Hotel Spa', $actual->getHotelInfo()->getHotelName());
        $this->assertEquals('32.747528', $actual->getHotelDescriptiveInfo()->getLocationInfo()->getLatitude());
        $this->assertCount(35, $actual->getHotelMediaInfo()->getMediaItems());
    }
}
