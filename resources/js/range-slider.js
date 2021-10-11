import noUiSlider from 'nouislider';
import 'nouislider/dist/nouislider.css'

const UNDEFINED_MODEL = 'undefined_model';

window.LivewireRangeSliderDevelop = function (data) {
    return {
        rangeSlider: null,
        models: [],
        model: UNDEFINED_MODEL,
        dispatch: null,
        init($dispatch) {
            this.dispatch = $dispatch;

            this.setup();
        
            if (this.isLazy() || this.hasModels()) {
                this.rangeSlider.on('change', 
                    (values, handle) => this.handleChange(values, handle)
                );

                return;
            }

            this.rangeSlider.on('update', 
                (values) => this.handleUpdate(values)
            );            
        },
        setup() {
            noUiSlider.create(this.$refs.range, {
                ...data.options
            })

            this.rangeSlider = this.$refs.range.noUiSlider;
        },
        handleUpdate(values) {
            this.dispatch('input', values);
        },
        isLazy() {
            return this.model !== UNDEFINED_MODEL;
        },
        hasModels() {
            return this.models.length === this.options.start.length;
        },
        handleChange(values, handle) {
            if (this.isLazy()) {
                this.$wire.set(this.model, values);
            } else {
                this.$wire.set(this.models[handle], values[handle]);
            }
        },
        ...data
    }
}