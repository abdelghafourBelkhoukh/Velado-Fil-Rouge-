<template>
  <NavBar />
  <SectionImages />
  <FooterVue />

</template> 

<script>
// @ is an alias to /src
import NavBar from "../components/navBar/NavBar.vue"
import FooterVue from "../components/footer/Footer.vue"
import SectionImages from "../components/login/LoginImageSec.vue"

export default {
  name: 'LoginView',
  components: {
    NavBar,
    FooterVue,
    SectionImages
}
}
</script>
<style lang="scss">
  .FooterContainer{
    margin:0 !important;
  }
</style>