<template>
  <NavBar />
  <shoppingCart />
  <Footer />
</template>
<script>
import shoppingCart from "../components/cart/shoppingCart.vue";
import Footer from "../components/Footer.vue";
import NavBar from "../components/NavBar.vue";

export default {
  name: "CartView",
  data() {
    return {
      //
    };
  },
  mounted() {
    this.$store.dispatch("getCart");
  },
  components: {
    shoppingCart,
    NavBar,
    Footer,
  },
};
</script>
