<?php

namespace SantoshJena\LivewireRangeSlider;

use Illuminate\Support\Str;
use Illuminate\View\Component;
use Illuminate\View\ComponentAttributeBag;
use SantoshJena\LivewireRangeSlider\Exceptions\RangeSliderException;
use Livewire\WireDirective;

class LivewireRangeSlider extends Component
{
    public $options;

    const EMPTY_MODIFER = 'empty';

    const LAZY_MODIFIER = 'lazy';

    const DEFER_MODIFIER = 'defer';

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(array $options)
    {
        $this->options = $options;
    }

    public function getWireModel(ComponentAttributeBag $attributes): array
    {
        $attribute = $attributes->wire('model');
        $separator = ',';

        if ( 
            (! $attribute->value() || is_bool($attribute->value())) || 
            empty($attribute->value())
         )
        {
            throw new RangeSliderException(
                'Missing or empty wire:model attribute.'
            );
        }

        return explode($separator, $attribute->value());
    }

    public function getWireModelModifier(ComponentAttributeBag $attributes)
    {
        if ($attributes->wire('model')->hasModifier('lazy')) 
        {
            return self::LAZY_MODIFIER;
        }

        if ($attributes->wire('model')->hasModifier('defer'))
        {
            return self::DEFER_MODIFIER;
        }

        return self::EMPTY_MODIFER;
    }

    public function render()
    {
        return view('livewire-range-slider::components.range-slider');
    }
}
