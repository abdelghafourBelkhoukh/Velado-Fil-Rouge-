<template>
  <cart v-if="this.$store.state.showProductPage" />
  <AlertCart />
  <router-view/>
</template>

<script>
import Cart from './components/ProductPage/ProductPage.vue'
import AlertCart from './components/alert/AlertCart.vue'
export default {
  name: 'App',
  components: {
    Cart,
    AlertCart
  },
  mounted() {
    //get all categories
    this.$store.dispatch("GetCategories")
    //get all products
    this.$store.dispatch("GetProducts")
    //check if user is logged
    if(localStorage.getItem("id")){
      this.$store.state.logged = true;
    }
  },
};

</script>

<style lang="scss">

@import url('https://fonts.googleapis.com/css2?family=Harmattan&family=Nunito:wght@200;300;400&family=Poppins:wght@100;200;300;400;500&display=swap');

  *{
    margin: 0;
    padding: 0;
    font-family: 'Poppins', sans-serif;
  }

</style>
