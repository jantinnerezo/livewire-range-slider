## Livewire Range Slider

## Installation

To get started, you need to add this into the repositories array of your project's composer.json.

```json
"repositories": [
    {
        "type": "vcs",
        "url": "https://github.com/jantinnerezo/livewire-range-slider.git"
    }
],
```
And then require the package.
```
composer require jantinnerezo/livewire-range-slider
```
Next, add `<x-livewire-range-slider::scripts />` component after the other app scripts.

```blade
@livewireScripts
<x-livewire-range-slider::scripts />
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
