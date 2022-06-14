<template>
    <NavBar />
    <checkout-page />
    <Footer />
</template>

<script>
import CheckoutPage from '../components/checkout/CheckoutPage.vue'
import Footer from '../components/footer/Footer.vue'
import NavBar from '../components/navBar/NavBar.vue'

export default{
    name: 'checkoutView',
    components: { CheckoutPage, NavBar, Footer },
}
</script>