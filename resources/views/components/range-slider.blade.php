@props(['options' => []])

@php
    $model = $attributes
        ->wire('model')
        ->hasModifier('lazy') ? $attributes->wire('model')->value() : 'undefined_model';
@endphp

<div
    x-data='LivewireRangeSliderDevelop({
        options: {!! json_encode($options) !!},
        model: "{{ $model }}"
    })'
    x-init="init($dispatch)"
    {{ $attributes }}
    wire:ignore
>
    <div x-ref="range"></div>
    {{ $slot }}
</div>