<template>
    <div class="row">
        <div class="columns large-8 large-offset-2">
            <div class="callout secondary">
                <div class="row">
                    <div class="columns small-12 text-center"><h3>Register</h3></div>
                </div>
                <br>
                <div class="row">
                    <div class="columns small-3">
                        <label for="username" class="text-left middle">Username:</label>
                    </div>
                    <div class="columns small-9">
                        <input type="text" name="username" v-model="username" v-validate="'required'">
                    </div>
                </div>
                <div class="row">
                    <div class="columns small-3">
                        <label for="email" class="text-left middle">Email:</label>
                    </div>
                    <div class="columns small-9">
                        <input type="email" name="email" v-model="email" v-validate="'required|email'">
                    </div>
                </div>
                <div class="row">
                    <div class="columns small-3">
                        <label for="password" class="text-left middle">Password:</label>
                    </div>
                    <div class="columns small-9">
                        <input type="password" name="password" v-model="password" v-validate="'required'">
                    </div>
                </div>
                <div class="row">
                    <div class="columns small-3">
                        <label for="confirm_password" class="text-left middle">Confirm Password:</label>
                    </div>
                    <div class="columns small-9">
                        <input type="password" name="confirm_password" v-model="confirm_password" v-validate="'required'">
                    </div>
                </div>
                <paw-planner-plan-selecter :plans="plans"></paw-planner-plan-selecter>
                <div class="text-center">
                    <button type="submit" class="button" @click.prevent="submit">Register</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    let Vue = require('vue')
    Vue.use(require('vee-validate'))

    export default {
        props: ['plans'],
        data() {
            return {
                username: null,
                email: null,
                password: null,
                confirm_password: null,
                plan: 1,
            }
        },
        mounted() {
            Event.$on('plan-change', (plan) => {
                this.plan = plan
            })  
        },
        methods: {
            submit() {
                this.$validator
                    .validateAll()
                    .then(() => {
                        console.log('here')
                    })
            }
        }
    }
</script>
