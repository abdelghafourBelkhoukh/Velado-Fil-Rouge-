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
import NavBar from "../components/NavBar.vue";
import SubNavBar from "../components/SubNavBar.vue";
import SectionImages from "../components/SectionImages.vue";
import BestSellsPosts from "../components/BestSellsPosts.vue";
import BestProductsPosts from "../components/BestProductsPosts.vue";
import BestOffersPosts from "../components/BestOffersPosts.vue";
import FooterVue from "../components/Footer.vue";
import SearchBar from "../components/SearchBar.vue";

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
