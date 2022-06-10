<template>
  <NavBar />
  <registerImageSec />
  <FooterVue />

</template> 

<script>
// @ is an alias to /src
import NavBar from "../components/navBar/NavBar.vue"
import FooterVue from "../components/footer/Footer.vue"
import registerImageSec from "../components/Register/RegisterImageSec.vue"

export default {
  name: 'RegisterView',
  components: {
    NavBar,
    FooterVue,
    registerImageSec
}
}
</script>
<style lang="scss">
  .FooterContainer{
    margin:0 !important;
  }
</style>