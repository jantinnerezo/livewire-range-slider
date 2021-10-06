<?php

namespace Jantinnerezo\LivewireRangeSlider;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
class LivewireRangeSliderServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'livewire-range-slider');

        View::composer('livewire-range-slider::script-renderer', function ($view) {
            $view->jsPath = __DIR__.'/../dist/range-slider.js';
        });
    }
}
