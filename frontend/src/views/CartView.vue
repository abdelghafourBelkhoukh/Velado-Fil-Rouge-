<template>
  <NavBar />
  <shoppingCart />
  <Footer />
</template>
<script>
import shoppingCart from "../components/cart/shoppingCart.vue";
import Footer from "../components/footer/Footer.vue";
import NavBar from "../components/navBar/NavBar.vue";

export default {
  name: "CartView",
  data() {
    return {
      //
    };
  },
  components: {
    shoppingCart,
    NavBar,
    Footer,
  },
  
};
</script>
