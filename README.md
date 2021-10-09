## Livewire Range Slider

A  simple [noUiSlider](https://github.com/leongersen/noUiSlider) blade component for your Livewire Components.



### Installation

To get started, you need to require the package to your project's composer.json

```bash
composer require jantinnerezo/livewire-range-slider
```

Next, simply add the component ``<x-livewire-range-slider::scripts />`` to your template after the ``@livewireScripts``.

```html
<html>
<body>
    <!-- @livewireScripts -->
    
    <x-livewire-range-slider::scripts />
</body>
</html>
```

### Requirements

This package is meant to use with [Livewire](https://laravel-livewire.com/) components. Make sure you are using it with Livewire projects only.

- PHP 7.4 or higher

- [Laravel 8](https://laravel.com/docs/8.x/installation)

- [Livewire](https://laravel-livewire.com/)

- [Alpine](https://alpinejs.dev)

- [noUiSlider](https://github.com/leongersen/noUiSlider) - already included into the package's bundled scripts.



### Usage

Assuming you have this properties inside your livewire component.

```php

public $options = [
    'start' => [
        10,
        20
    ],
    'range' => [
        'min' =>  [1],
        'max' => [100]
    ],
    'connect' => true,
    'behaviour' => 'tap-drag',
    'tooltips' => true,
    'pips' => [
        'mode' => 'steps',
        'stepped' => true,
        'density' => 4
    ]
];

public $values = [];
```

The `$options` property is simply the noUiSlider options you pass to the component, for more details and configurations please check [noUiSlider - JavaScript Range Slider | Refreshless.com](https://refreshless.com/nouislider/).

The `$values` property is the model for the range slider values.



###### Livewire's default ``wire:model`` attribute

```php
<x-range-slider :options="$options" wire:model="values" />
```

###### 

###### Debouncing

If you want to avoid too many network requests, ``.debounce`` modifier works out-of-the-box.

```php
<x-range-slider 
    :options="$options" 
    wire:model.debounce.500ms="values" 
/>
```



###### Deferred

In cases where you don't need range slider to live, you can use`.defer` modifier.

```php
<x-range-slider :options="$options" wire:model.defer="values" />
```
