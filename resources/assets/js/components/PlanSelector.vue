<template>
    <div class="row">
        <div class="columns small-12">
            <label class="text-left middle">Plans:</label>
        </div>
        <div class="columns small-3" v-for="(p, i) in JSON.parse(plans)">
            <div class="callout price-option text-center" :class="{ 'selected' : (i+1) === plan }" @click.prevent="selectPlan(i+1)">
                <p><strong>{{ p.description }}</strong></p>
                <p class="price">Cost: {{ $root.dosh(totalValue(p.value)) }}</p>
                <p class="discounted" v-if="discountValue">{{ valueOfDiscount(p.value) }}</p>
                <input type="radio" name="plan" :value="i+1" v-model="plan">
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['plans'],
        data() {
            return {
                plan: 1,
                discountValue: null,
                discountCurrency: null,
            }
        },
        mounted() {
            Event.$on('offer-applied', (promo) => {
                this.discountValue = promo.value
                this.discountCurrency = promo.currency
            })
        },
        methods: {
            selectPlan(plan) {
                this.plan = plan

                Event.$emit('plan-change', plan)
            },
            totalValue(value) {
                if (this.discountValue) {
                    let discountedValue = 0
                    if (this.discountCurrency && this.discountCurrency === '%') {
                        discountedValue = this.$root.percentage(value, this.discountValue)
                        discountedValue = value - discountedValue
                    } else {
                        discountedValue = value - this.discountValue
                    }

                    if (discountedValue < 0) {
                        return 0
                    }

                    return discountedValue
                }

                return value
            },
            valueOfDiscount(value) {
                if (this.discountValue) {
                    let discountedValue = 0
                    if (this.discountCurrency && this.discountCurrency === '%') {
                        discountedValue = this.$root.percentage(value, this.discountValue)
                    } else {
                        discountedValue = this.discountValue
                    }

                    if (discountedValue <= 0) {
                        return
                    }

                    return `-${this.$root.dosh(discountedValue)}`
                }

                return
            }
        }
    }
</script>
