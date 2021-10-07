import noUiSlider from 'nouislider';
import 'nouislider/dist/nouislider.css'

const UNDEFINED_MODEL = 'undefined_model';

window.LivewireRangeSliderDevelop = function (data) {
    return {
        rangeSlider: null,
        init($dispatch) {
            noUiSlider.create(this.$refs.range, {
                ...data.options
            })

            this.rangeSlider = this.$refs.range.noUiSlider;
            
            if (this.model === UNDEFINED_MODEL) {
                this.rangeSlider.on('update', (values, handle) => {
                    $dispatch('input', values);
                });

                return;
            }

            this.rangeSlider.on('change', (values, handle) => {
                this.$wire.set(this.model, values);
            });
        },
        ...data
    }
}