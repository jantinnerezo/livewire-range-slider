import noUiSlider from 'nouislider';
import 'nouislider/dist/nouislider.css'

const LAZY = 'lazy';
const IMMEDIATE = 'immediate';

window.LivewireRangeSlider = function (data) {
    return {
        rangeSlider: null,
        model: null, 
        handling: null,
        init() {
            noUiSlider.create(this.$refs.range, {
                ...data.options
            })

            this.rangeSlider = this.$refs.range.noUiSlider;

            if (this.handling == LAZY) {
                this.rangeSlider.on('change', (values, handle) => {
                    this.$wire.set(this.model, values);
                });
            }

            if (this.handling == IMMEDIATE) {
                this.rangeSlider.on('update', (values, handle) => {
                    this.$wire.set(this.model, values);
                });
            }
        },
        getValues() {
            this.$wire.set(this.model, this.$refs.range.noUiSlider.get());
        },
        ...data
    }
}
