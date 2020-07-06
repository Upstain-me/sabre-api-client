<?php

namespace Upstain\SabreApiClient\Tests;

use Codeception\Test\Unit;
use Upstain\SabreApiClient\App;

class AppTest extends Unit
{
    public function testSomeFeature()
    {
        $app = new App();
        $this->assertEquals(3, $app->method());
    }
}
