<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
	public $baseUrl = 'texcare.dev';
    use CreatesApplication;
}
