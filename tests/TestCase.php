<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    function getResponseData($response, $key){
        return $response->getOriginalContent()->getData()[$key]->all();
    }
}
