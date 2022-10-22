<?php

namespace Jantinnerezo\LivewireRangeSlider;

use Illuminate\View\Component;
use Illuminate\View\ComponentAttributeBag;
use Jantinnerezo\LivewireRangeSlider\Exceptions\RangeSliderException;

class LivewireRangeSlider extends Component
{
    public const DEFAULT_SOURCE = 'range';

    public array $options;

    public string $source;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(array $options, string $source = self::DEFAULT_SOURCE)
    {
        $this->options = $options;
        $this->source = $source;
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

    public function getWireModelModifier(ComponentAttributeBag $attributes): string
    {
        if ($attributes->wire('model')->hasModifier('defer'))
        {
            return 'defer';
        }

        return 'default';
    }

    public function render()
    {
        return view('livewire-range-slider::components.range-slider');
    }
}
