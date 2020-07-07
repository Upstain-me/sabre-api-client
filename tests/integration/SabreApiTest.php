<?php

namespace Upstain\SabreApiClient\Tests\Integration;

use Codeception\Test\Unit;
use Prophecy\Argument;
use Prophecy\PhpUnit\ProphecyTrait;
use Symfony\Contracts\Cache\CacheInterface;
use Upstain\SabreApiClient\Request\Hotel\Details\SearchDetailInput;
use Upstain\SabreApiClient\Request\Hotel\SearchCriteria\SearchInput;
use Upstain\SabreApiClient\Response\Authorization\AuthorizationResponse;
use Upstain\SabreApiClient\Sabre;

class SabreApiTest extends Unit
{
    use ProphecyTrait;

    protected \IntegrationTester $tester;

    public function testAuthorization()
    {
        $sabreClient = new Sabre('https://api-crt.cert.havail.sabre.com', $_ENV['SABRE_API_USER_SECRET']);

        $response = $sabreClient->authenticate()->getAuthResponse();

        $this->assertEquals('bearer', $response->getTokenType());
    }

    public function testHotelAvailability()
    {
        $sabreClient = $this->auth();

        $input = new SearchInput();
        $input->setStartDate(new \DateTime());
        $input->setEndDate(new \DateTime('+2 days'));
        $response = $sabreClient->authenticate()->hotelAvailability($input);

        $this->assertArrayHasKey('GetHotelAvailRS', $response->getRawResponse());
        $this->assertEquals('Grand Hyatt Dfw', $response->fromRawResponse()->getHotelAvailInfo()[0]->getHotelInfo()->getHotelName());
    }

    public function testHotelDetails()
    {
        $sabreClient = $this->auth();

        $input = new SearchDetailInput();
        $input->setHotelCode('100148572');

        $response = $sabreClient->hotelDetails($input);

        $this->assertArrayHasKey('GetHotelDetailsRS', $response->getRawResponse());

        $actual = $response->fromRawResponse();
        $this->assertIsArray($actual->getHotelMediaInfo()->getMediaItems());
    }

    private function auth(): Sabre
    {
        $sabreClient = new Sabre('https://api-crt.cert.havail.sabre.com', $_ENV['SABRE_API_USER_SECRET']);
        if ($_ENV['SABRE_API_ACCESS_TOKEN']) {
            $cache = $this->prophesize(CacheInterface::class);
            $authResponse = new AuthorizationResponse(
                $_ENV['SABRE_API_ACCESS_TOKEN'],
                'bearer',
                '604800'
            );
            $cache->get(Argument::any(), Argument::any())->willReturn($authResponse);

            $sabreClient->authenticate($cache->reveal());
        } else {
            $sabreClient->authenticate();
        }

        return $sabreClient;
    }
}
