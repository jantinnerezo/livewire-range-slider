<?php

namespace Jantinnerezo\LivewireRangeSlider;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
class LivewireRangeSliderServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'livewire-range-slider');

        Blade::component('range-slider', LivewireRangeSlider::class);

        View::composer('livewire-range-slider::components.styles', function ($view) {
            $view->cssPath = __DIR__.'/../public/build/assets/range-slider.812efd31.css';
        });

        View::composer('livewire-range-slider::components.scripts', function ($view) {
            $view->jsPath = __DIR__.'/../public/build/assets/range-slider.5e5d4202.js';
        });
    }
}
