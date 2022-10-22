import noUiSlider from 'nouislider';

window.LivewireRangeSlider = function (source, options) {
    const { 
        models, 
        modifier, 
        position, 
        ...noUiSliderOptions 
    } = options

    return {
        rangeSlider: null,
        models: options.models,
        modifier: options.modifier,
        position: options.position,
        setup() {
            if (!this.$refs[source]) {
                console.error(`No such ref: "${source}"`)

                return
            }

            noUiSlider.create(this.$refs[source], noUiSliderOptions)

            this.rangeSlider = this.$refs[source].noUiSlider

            this.rangeSlider.on('change', (values, handle) =>  {
                this.setModelValue(values, handle)
            })
        },
        setModelValue(values, handle) {
            if (!this.models[handle]) {
                console.error(`No such model for handle ${handle}`)

                return
            }

            const model = this.models[handle]
            const value = parseFloat(values[handle])

            if (this.position) {
                this.wire(model, {
                    model,
                    value,
                    position: this.rangeSlider.getPositions()[handle]
                })

                return;
            }

            this.wire(this.models[handle], value)
        },
        wire(property, value) {
            this.$wire.set(property, value, this.modifier === 'defer')
        }
    }
}