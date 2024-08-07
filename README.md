## Livewire Range Slider

A simple [noUiSlider](https://github.com/leongersen/noUiSlider) blade component for your Livewire Components.

### Installation

To get started, require the package to your project's composer.json

```bash
composer require santoshjena/livewire-range-slider
```

Next, add the scripts component to your template after the ``@livewireScripts``.

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

- Laravel 8 and 9

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

public $values;
```

The `$options` property is simply the noUiSlider options you pass to the component, for more details and configurations please check [noUiSlider - JavaScript Range Slider | Refreshless.com](https://refreshless.com/nouislider/).

The `$values` property is the model for the range slider values.



#### Livewire's default `wire:model` attribute

```html
<x-range-slider :options="$options" wire:model="values" />
```

#### Deferred

In cases where you don't need range slider to update live, you can use `.defer` modifier.

```html
<x-range-slider :options="$options" wire:model.defer="values" />
```

#### Multiple properties

Targetting a property for each handle also works out-of-the-box, simply add the properties comma separated.

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

public $range = [
    'min' => 10, // Targets handle 1 value
    'max' => 100 // Targets handle 2 value
];
```

``` html
<x-range-slider :options="$options" wire:model="range.min,range.max" />
```
