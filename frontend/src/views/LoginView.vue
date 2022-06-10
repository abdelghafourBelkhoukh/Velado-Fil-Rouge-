<template>
  <NavBar />
  <SectionImages />
  <FooterVue />

</template> 

<script>
// @ is an alias to /src
import NavBar from "../components/NavBar.vue"
import FooterVue from "../components/Footer.vue"
import SectionImages from "../components/LoginImageSec.vue"

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