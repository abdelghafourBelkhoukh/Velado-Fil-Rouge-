<template>
  <NavBar />
  <SubNavBar />

  <SectionImages />
  <div class="search w-full">
    <SearchBar />
  </div>
  <BestSellsPosts />
  <BestOffersPosts />
  <BestProductsPosts />
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
  },
};
</script>
<style lang="sass" scoped></style>
