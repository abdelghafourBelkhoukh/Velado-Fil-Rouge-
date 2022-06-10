<template>

<div v-if="alertCart"   class="w-auto fixed z-[150] flex justify-end top-5 right-5">
    <div :class="alertCart" class="flex justify-between items-center py-6 px-6 shadow-xl rounded-lg w-auto">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        class="stroke-current flex-shrink-0 h-6 w-6 mr-2"
        fill="none"
        viewBox="0 0 24 24"
      >
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
        />
      </svg>
      <span v-if="alertCart=='success'">Product was added to cart.</span>
      <span v-if="alertCart=='error'">Unable to add product to cart.</span>
      <span v-if="alertCart=='warning'">Product already exists</span>
      <router-link to="/cart" class="">
        <span class="text-sm ml-4 font-semibold">Go to cart</span>
      </router-link>
    </div>
  </div>

</template>

<script>
export default {
  name: 'AlertCart',
  data(){
    return{
      //
    }
  },
  computed:{
    alertCart(){
      return this.$store.state.alertCart
    }
  },
  methods:{
    //
  },
}
</script>

<style lang="scss" scoped>
.success {
  background-color: #36d399;
}
.warning {
  background-color: #fbbd23;
}
.error {
  background-color: #f87272;
}
</style>
