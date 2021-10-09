## Livewire Range Slider (WIP Docs)
A simple blade component for your range slider needs. 

## Installation

To get started, you need to require the packge to your project's composer.json.
```
composer require jantinnerezo/livewire-range-slider
```

Next, add `<x-livewire-range-slider::scripts />` component after `@livewireScripts`.

```blade
<x-livewire-range-slider::scripts />
``` 

## Alpine
Livewire Range Slider requires [Alpine](https://github.com/alpinejs/alpine). Make you already included it:

```html
<!-- Alpine v2 -->
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

<!-- Alpine v3 -->
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
```

## Usage

Assuming you have this properties inside your livewire component.
``` php
public $options = [
    'start' => [
        10,
        20,
    ],
    'range' => [
        'min' =>  [1],
        'max' => [100]
    ],
]
```

```blade
<x-livewire-range-slider::range-slider  
    :options="$options" 
    wire:model="values"
/>
``` 


## Customization
Styling makes it easy using Tailwind CSS. `resources/js/range-slider/theming.js`
```javascript
const plugin = require('tailwindcss/plugin');

module.exports = plugin(function({ addComponents, theme }) {
    const components = {
        '.noUi-target': { },
        '.noUi-base': { }.
        '.noUi-origin': { },
        '.noUi-handle': { },
        '.noUi-touch-area': { },
        '.noUi-connect': { },
        '.noUi-state-tap': { }
    }
    addComponents(components);
});
```

And require plugin into the `tailwind.config.js`:

``` javascript
plugins: [
   require('./resources/js/range-slider/theming.js')
],
```
