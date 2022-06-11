<template>
  <NavBar />
  <SubNavBar />

  <SectionImages />
  <div class="search w-full">
    <SearchBar />
  </div>
  <BestSellsPosts v-if="!search"/>
  <BestOffersPosts v-if="!search"/>
  <BestProductsPosts v-if="!search"/>
  <SearchPosts v-if="search"/>
  <FooterVue />
</template>

<script>
// @ is an alias to /src
import NavBar from "../components/navBar/NavBar.vue";
import SubNavBar from "../components/navBar/SubNavBar.vue";
import SectionImages from "../components/sectionImage/SectionImagesHome.vue";
import BestSellsPosts from "../components/productPost/BestSellsPosts.vue";
import BestProductsPosts from "../components/productPost/BestProductsPosts.vue";
import BestOffersPosts from "../components/productPost/BestOffersPosts.vue";
import FooterVue from "../components/footer/Footer.vue";
import SearchBar from "../components/searchBar/SearchBar.vue";
import SearchPosts from "../components/productPost/SearchPosts.vue";

export default {
  name: "HomeView",
  components: {
    NavBar,
    SubNavBar,
    SectionImages,
    BestSellsPosts,
    BestProductsPosts,
    BestOffersPosts,
    FooterVue,
    SearchBar,
    SearchPosts
  },
  computed: {
    search() {
      return this.$store.state.search;
    },
  },
};
</script>
<style lang="sass" scoped></style>
