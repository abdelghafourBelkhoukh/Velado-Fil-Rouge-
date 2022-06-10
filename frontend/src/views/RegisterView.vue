<template>
  <NavBar />
  <registerImageSec />
  <FooterVue />

</template> 

<script>
// @ is an alias to /src
import NavBar from "../components/NavBar.vue"
import FooterVue from "../components/Footer.vue"
import registerImageSec from "../components/RegisterImageSec.vue"

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