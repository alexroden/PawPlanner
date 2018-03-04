<template>
    <div class="row">
        <div class="columns large-8 large-offset-2">
            <div class="register">
                <div class="row">
                    <div class="columns small-12 text-center"><h3>Register</h3></div>
                </div>
                <br>
                <div class="row">
                    <div class="columns small-3">
                        <label for="username" class="text-left middle">Username:</label>
                    </div>
                    <div class="columns small-9">
                        <input type="text" name="username" v-model="username" v-validate="'required'" class="no-margin" :class="{'input-alert': errors.has('username')}">
                        <span class="promo-error-message" v-show="errors.has('username')">{{ errors.first('username') }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="columns small-3">
                        <label for="email" class="text-left middle">Email:</label>
                    </div>
                    <div class="columns small-9">
                        <input type="email" name="email" v-model="email" v-validate="'required|email'" class="no-margin" :class="{'input-alert': errors.has('email')}">
                        <span class="promo-error-message" v-show="errors.has('email')">{{ errors.first('email') }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="columns small-3">
                        <label for="password" class="text-left middle">Password:</label>
                    </div>
                    <div class="columns small-9">
                        <input type="password" name="password" v-model="password" v-validate="'required'" class="no-margin" :class="{'input-alert': errors.has('password')}">
                        <span class="promo-error-message" v-show="errors.has('password')">{{ errors.first('password') }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="columns small-3">
                        <label for="confirm_password" class="text-left middle">Confirm Password:</label>
                    </div>
                    <div class="columns small-9">
                        <input type="password" name="confirm_password" v-model="confirm_password" v-validate="'required|confirmed:password'" class="no-margin" :class="{'input-alert': errors.has('confirm_password')}">
                        <span class="promo-error-message" v-show="errors.has('confirm_password')">{{ errors.first('confirm_password') }}</span>
                    </div>
                </div>
                <paw-planner-plan-selecter :plans="plans"></paw-planner-plan-selecter>
                <paw-planner-offer-input></paw-planner-offer-input>
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
                promoApplied: false,
                promocode: null,
            }
        },
        mounted() {
            Event.$on('plan-change', (plan) => {
                this.plan = plan
            })

            Event.$on('offer-applied', (promo) => {
                this.promoApplied = true
                this.promocode = promo.promocode
            })
        },
        methods: {
            submit() {
                this.$validator
                    .validateAll()
                    .then(() => {
                        window.axios.get('/api/register', {
                            params: {
                                username: this.username,
                                email: this.email,
                                password: this.password,
                                confirm_password: this.confirm_password,
                                plan: this.plan,
                                promo: {
                                    applied: this.promoApplied,
                                    code: this.promocode
                                }
                            }
                        }).then(response => {
                            console.log(response);
                        }).catch(error => {
                            console.log(error);
                        })
                    })
            }
        }
    }
</script>
