<?php

namespace SantoshJena\LivewireRangeSlider\Tests;

use SantoshJena\LivewireRangeSlider\LivewireRangeSliderServiceProvider;
use Livewire\LivewireServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app)
    {
        return [
            LivewireServiceProvider::class,
            LivewireRangeSliderServiceProvider::class
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('app.key', 'base64:Hupx3yAySikrM2/edkZQNQHslgDWYfiBfCuSThJ5SK8=');
    }
}