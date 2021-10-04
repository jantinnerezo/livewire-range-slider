@props(['options' => [], 'handling' => null])

<div 
    x-data='LivewireRangeSlider({
        options: {!! json_encode($options) !!},
        model: "{{ $attributes->get('wire:model') }}",
        handling: "{{ $handling }}",
    })'
    x-init="init()"
    wire:ignore
>
    <div x-ref="range"></div>
    {{ $slot }}
</div>