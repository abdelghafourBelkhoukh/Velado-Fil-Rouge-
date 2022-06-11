<template>
  <NavBar />
  <SubNavBar />
  <SectionImages />
  <div class="search w-full ">
    <SearchBar />
  </div>
  <CategoryPosts v-if="!search"/>
  <SearchPosts v-if="search"/>
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
import SearchPosts from "@/components/productPost/SearchPosts.vue"

export default {
  name: 'CategoryView',
  components: {
    NavBar,
    SubNavBar,
    SectionImages,
    CategoryPosts,
    FooterVue,
    SearchBar,
    SearchPosts
  },
  computed: {
    search() {
      return this.$store.state.search;
    },
  },
}
</script>
<style lang="sass" scoped>

</style>