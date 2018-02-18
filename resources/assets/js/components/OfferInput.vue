<template>
  <div>
      <div class="row" v-if="!promoValid">
          <div class="columns small-3">
            <label for="promo" class="text-left middle">Promotional Code:</label>
          </div>
          <div class="columns small-9">
            <div class="input-group no-margin">
                <input class="input-group-field" :class="{ 'input-alert' : promoApplied && !promoValid }" type="text" name="promo" v-model="promo">
                <div class="input-group-button">
                    <button class="button" title="Add Promotional Code" @click.prevent="applyPromo"><i class="zmdi zmdi-plus-circle"></i></button>
                </div>
            </div>
            <span class="promo-error-message" v-if="promoApplied && !promoValid">Invaild promotional code</span>
          </div>
      </div>
      <div class="row" v-else>
          <div class="columns small-12">
              <p class="promocode">Promotional code: <span>{{ validPromo.name }} <i>({{ validPromo.promocode }})</i></span> applied</p>
          </div>
      </div>
  </div>
</template>

<script>
    export default {
       data() {
          return {
              promo: null,
              validPromo: {},
              promoApplied: false,
              promoValid: false,
          }
       },
       methods: {
          applyPromo() {
              if (this.promo && this.promo !== '') {
                  window.axios.get('/api/offers/' + this.promo + '/validate').then((response) => {
                      this.validPromo = response.data.data
                      this.promoApplied = true
                      this.promoValid = true
                      Event.$emit('offer-applied', this.validPromo.value, this.validPromo.currency)
                  }).catch((error) => {
                      this.promoApplied = true
                      this.promoValid = false
                  })
              }
          }
       }
    }
</script>