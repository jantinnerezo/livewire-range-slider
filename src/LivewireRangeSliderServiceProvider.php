<?php

namespace Jantinnerezo\LivewireRangeSlider;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class LivewireRangeSliderServiceProvider extends ServiceProvider
{
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
                __DIR__.'/../dist' => public_path('js/vendor/livewire-range-slider'),
            ], 'livewire-range-slider');
        }
    }

    private function registerDirectives()
    {
        Blade::directive('livewireRangeSliderScripts', function () {
            $scriptPath = asset('/js/vendor/livewire-range-slider/range-slider.js');
            return <<<EOF
<script src="{$scriptPath}"></script>
EOF;
        });
    }
}
