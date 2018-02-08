<template>
    <div class="row">
        <div class="columns small-12">
            <label class="text-left middle">Plans:</label>
        </div>
        <div class="columns small-3" v-for="(p, i) in JSON.parse(plans)">
            <div class="callout price-option text-center" :class="{ 'selected' : (i+1) === plan }" @click.prevent="selectPlan(i+1)">
                <p><strong>{{ p.description }}</strong></p>
                <p>Cost: {{ $root.dosh(p.value) }}</p>
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
            }
        },
        mounted() {
            //
        },
        methods: {
            selectPlan(plan) {
                this.plan = plan

                Event.$emit('plan-change', plan)
            }
        }
    }
</script>
