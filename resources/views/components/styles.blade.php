@isset($cssPath)
    <style>
        /**** Livewire Range Slider Scripts ****/
        {!! file_get_contents($cssPath) !!}
    </style>
@endisset