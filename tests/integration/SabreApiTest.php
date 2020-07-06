<?php

namespace Upstain\SabreApiClient\Tests\Integration;

use Upstain\SabreApiClient\Request\Hotel\Details\SearchDetailInput;
use Upstain\SabreApiClient\Request\Hotel\SearchCriteria\SearchInput;
use Upstain\SabreApiClient\Sabre;
use Codeception\Test\Unit;

class SabreApiTest extends Unit
{
    protected \IntegrationTester $tester;

    public function testAuthorization()
    {
        $sabreClient = new Sabre('https://api-crt.cert.havail.sabre.com', $_ENV['SABRE_API_USER_SECRET']);

        $response = $sabreClient->authenticate()->getAuthResponse();

        $this->assertEquals('bearer', $response->getTokenType());
    }

    public function testHotelAvailability()
    {
        $sabreClient = new Sabre('https://api-crt.cert.havail.sabre.com', $_ENV['SABRE_API_USER_SECRET']);

        $input = new SearchInput();
        $input->setStartDate(new \DateTime());
        $input->setEndDate(new \DateTime('+2 days'));
        $response = $sabreClient->authenticate()->hotelAvailability($input);

        $this->assertArrayHasKey('GetHotelAvailRS', $response->getRawResponse());
        $this->assertEquals('Grand Hyatt Dfw', $response->fromRawResponse()->getHotelAvailInfo()[0]->getHotelInfo()->getHotelName());
    }

    public function testHotelDetails()
    {
        $sabreClient = new Sabre('https://api-crt.cert.havail.sabre.com', $_ENV['SABRE_API_USER_SECRET']);

        $input = new SearchDetailInput();
        $input->setHotelCode('100148572');
        $response = $sabreClient->authenticate()->hotelDetails($input);

        // TODO add response interface to both responses.
    }
}
