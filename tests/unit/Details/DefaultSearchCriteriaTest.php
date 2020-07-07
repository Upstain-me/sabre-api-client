<?php

namespace Upstain\SabreApiClient\Tests\Unit\Details;

use Codeception\Test\Unit;
use Upstain\SabreApiClient\Request\Hotel\Details\DefaultSearchCriteria;
use Upstain\SabreApiClient\Request\Hotel\Details\SearchDetailInput;

class DefaultSearchCriteriaTest extends Unit
{
    public function testBuild()
    {
        $expected = \json_decode(
            \file_get_contents(__DIR__ . '/../../_data/detailsRequest.json'),
            true,
            512,
            JSON_THROW_ON_ERROR
        )['GetHotelDetailsRQ']['SearchCriteria'];

        $actual = (new DefaultSearchCriteria())->build();
        $this->assertEquals($expected['HotelRefs']['HotelRef']['HotelCode'], $actual['HotelRefs']['HotelRef']['HotelCode']);
        $this->assertEquals($expected['RateInfoRef']['ConvertedRateInfoOnly'], $actual['RateInfoRef']['ConvertedRateInfoOnly']);
        $this->assertEquals($expected['RateInfoRef']['RatePlanCandidates']['ExactMatchOnly'], $actual['RateInfoRef']['RatePlanCandidates']['ExactMatchOnly']);
        $this->assertEquals($expected['HotelContentRef']['DescriptiveInfoRef']['PropertyInfo'], $actual['HotelContentRef']['DescriptiveInfoRef']['PropertyInfo']);
    }

    public function testOverride()
    {
        $defaultSearchCriteria = new DefaultSearchCriteria();
        $defaultSearchCriteria->build();

        $input = new SearchDetailInput();
        $input->setHotelCode('test');

        $actual = $defaultSearchCriteria->override($input);

        $this->assertEquals('test', $actual['HotelRefs']['HotelRef']['HotelCode']);
    }
}
