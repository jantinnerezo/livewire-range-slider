<?php

namespace Jantinnerezo\LivewireRangeSlider;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class LivewireRangeSliderServiceProvider extends ServiceProvider
{
    const VENDOR_PATH = 'vendor/js/livewire-range-slider';

    public function boot()
    {
        $this->registerViews();

        $this->registerPublishables();

        $this->registerDirectives();
    }

    protected function registerViews()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'livewire-range-slider');
    }

    protected function registerPublishables()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../dist' => public_path(self::VENDOR_PATH),
            ], 'livewire-range-slider');
        }
    }

    private function registerDirectives()
    {
        Blade::directive('livewireRangeSliderScripts', function () {
            $scriptPath = asset(self::VENDOR_PATH . 'range-slider.js');
            return <<<EOF
<script src="{$scriptPath}"></script>
EOF;
        });
    }
}
