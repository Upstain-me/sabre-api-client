<?php

namespace Upstain\SabreApiClient\Tests\Unit;

use Codeception\Test\Unit;
use Upstain\SabreApiClient\Request\Hotel\SearchCriteria\DefaultSearchCriteria;
use Upstain\SabreApiClient\Request\Hotel\SearchCriteria\SearchInput;

class DefaultSearchCriteriaTest extends Unit
{
    public function testBuild()
    {
        $expected = \json_decode(
            \file_get_contents(__DIR__ . '/../_data/request.json'),
            true,
            512,
            JSON_THROW_ON_ERROR
        )['GetHotelAvailRQ']['SearchCriteria'];

        $actual = (new DefaultSearchCriteria())->build();
        $this->assertEquals($expected['PageSize'], $actual['PageSize']);
    }

    public function testOverride()
    {
        $searchCriteria = new DefaultSearchCriteria();
        $searchCriteria->build();

        $input = new SearchInput();
        $input->setAirportCode('CLJ');
        $input->setStartDate(new \DateTime());
        $input->setEndDate(new \DateTime('+1 day'));

        $actual = $searchCriteria->override($input);

        $this->assertEquals(
            $input->getStartDate()->format('Y-m-d'),
            $actual['RateInfoRef']['StayDateRange']['StartDate']
        );
        $this->assertEquals(
            $input->getEndDate()->format('Y-m-d'),
            $actual['RateInfoRef']['StayDateRange']['EndDate']
        );
        $this->assertEquals(
            $input->getAirportCode(),
            $actual['GeoSearch']['GeoRef']['RefPoint']['Value']
        );
    }
}
