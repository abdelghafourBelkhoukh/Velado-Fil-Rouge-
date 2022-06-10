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
import NavBar from "../components/navBar/NavBar.vue"
import SubNavBar from "../components/navBar/SubNavBar.vue"
import FooterVue from "../components/footer/Footer.vue"
import SearchBar from "../components/searchBar/SearchBar.vue"
import SectionImages from "../components/sectionImage/SectionImagesCategory.vue"
import CategoryPosts from "@/components/productPost/CategoryPosts.vue"

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