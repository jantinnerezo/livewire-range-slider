<div
    x-data='LivewireRangeSlider("{{ $source }}", {
        models: {!! json_encode($getWireModel($attributes)) !!},
        modifier: "{{ $getWireModelModifier($attributes) }}",
        position: {{ $attributes->get("position") ? 1 : 0 }},
        ...{!! json_encode($options) !!}
    })'
    x-init="setup"
    {{ $attributes }}
    wire:ignore
>
    <div x-ref="{{ $source }}"></div>
    {{ $slot }}
</div>