<?php

namespace SantoshJena\LivewireRangeSlider;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
class LivewireRangeSliderServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'livewire-range-slider');

        Blade::component('range-slider', LivewireRangeSlider::class);

        View::composer('livewire-range-slider::components.scripts', function ($view) {
            $view->jsPath = __DIR__.'/../dist/range-slider.js';
        });
    }
}
