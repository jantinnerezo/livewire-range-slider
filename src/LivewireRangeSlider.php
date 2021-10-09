<?php

namespace Jantinnerezo\LivewireRangeSlider;

use Illuminate\View\Component;
use Illuminate\View\ComponentAttributeBag;

class LivewireRangeSlider extends Component
{
    const UNDEFINED_MODEL = 'undefined_model';

    public $options;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(array $options)
    {
        $this->options = $options;
    }

    public function notEnoughModels(ComponentAttributeBag $attributes): bool
    {
        $modelCount = count($this->getWireModels($attributes));

        if (
            $this->getWireModel($attributes) === self::UNDEFINED_MODEL && $modelCount > 0
        ) {
            return count($this->options) != $modelCount;
        }

        return false;
    }

    public function missingWireModelAttributes(ComponentAttributeBag $attributes): bool
    {
        if ( 
            ! $attributes->wire('model')->value() && 
            ! $attributes->wire('models')->value()
        ) {
            return true;
        }

        return false;
    }

    public function getWireModel(ComponentAttributeBag $attributes): string
    {
        $model = $attributes->wire('model');

        if ($model->hasModifier('lazy')) {
            return $model->value();
        }

        return self::UNDEFINED_MODEL;
    }

    public function getWireModels(ComponentAttributeBag $attributes): array
    {
        $models = $attributes->wire('models');

        if ($models->value()) 
        {
            return explode(',', $models->value());
        }

        return [];
    }

    public function render()
    {
        return view('livewire-range-slider::components.range-slider');
    }
}
