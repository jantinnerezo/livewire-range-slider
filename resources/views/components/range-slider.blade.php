@php
    $count = count($options['start']);
    $modelsCount = count($getWireModels($attributes));
    
    if ($missingWireModelAttributes($attributes)) {
        throw new \Jantinnerezo\LivewireRangeSlider\Exceptions\RangeSliderException('Missing wire:model or wire:models attribute.');
    }

    if ($notEnoughModels($attributes)) {
        throw new \Jantinnerezo\LivewireRangeSlider\Exceptions\RangeSliderException(
            "Properties you provided on wire:models did not match with the number of handles. Expected models count: {$count} received {$modelsCount} "
        );
    }
@endphp

<div
    x-data='LivewireRangeSlider({
        options: {!! json_encode($options) !!},
        models: {!! json_encode($getWireModels($attributes)) !!},
        model: "{{ $getWireModel($attributes) }}",
        deferred: {{ $attributes->wire('models')->hasModifier('defer') ? 1 : 0 }}
    })'
    x-init="init($dispatch)"
    {{ $attributes }}
    wire:ignore
>
    <div x-ref="range"></div>
    {{ $slot }}
</div>