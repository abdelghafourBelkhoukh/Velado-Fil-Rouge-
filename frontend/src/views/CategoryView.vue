<template>
  <NavBar />
  <SubNavBar />
  <SectionImages />
  <div class="search w-full ">
    <SearchBar />
  </div>
  <CategoryPosts />
  <FooterVue />

</template> 

<script>
// @ is an alias to /src
import NavBar from "../components/NavBar.vue"
import SubNavBar from "../components/SubNavBar.vue"
import FooterVue from "../components/Footer.vue"
import SearchBar from "../components/SearchBar.vue"
import SectionImages from "../components/SectionImagesCategory.vue"
import CategoryPosts from "@/components/CategoryPosts.vue"

export default {
  name: 'CategoryView',
  components: {
    NavBar,
    SubNavBar,
    SectionImages,
    CategoryPosts,
    FooterVue,
    SearchBar
}
}
</script>
<style lang="sass" scoped>

</style>