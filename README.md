## Livewire Range Slider

## Installation

To get started, require the package via Composer:

```
composer require jantinnerezo/livewire-range-slider
```
Next, publish package scripts. To do this run `php artisan vendor:publish --tag=livewire-range-slider --force` and include `@livewireRangeSliderScripts` directive after the other app scripts.

```blade
@livewireScripts
@livewireRangeSliderScripts
``` 

## Alpine
Livewire Range Slider requires [Alpine](https://github.com/alpinejs/alpine). You can use the official CDN to quickly include Alpine:

```html
<!-- Alpine v2 -->
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

<!-- Alpine v3 -->
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
```

## Usage

```blade
<x-livewire-range-slider::range-slider  
    :options="$options" 
    wire:model="values"
/>
``` 

## Customization
Styling makes it easy using Tailwind CSS
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