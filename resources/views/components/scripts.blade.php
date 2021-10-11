@isset($jsPath)
    <script>
        /**** Livewire Range Slider Scripts ****/
        {!! file_get_contents($jsPath) !!}
    </script>
@endisset