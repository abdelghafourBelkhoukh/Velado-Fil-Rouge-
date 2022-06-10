<template>
    <div class="">
        <div class="nav-menu flex flex-col w-full py-2 px-10 bg-black text-white justify-between h-[10vh]">
          <div class="h-[10vh] w-full flex items-center justify-between">
            <button @click="toggleSideBar">
              <i class="fa-solid fa-bars text-3xl" ></i>
            </button>
              <div class="logo w-auto ml-10 "><router-link to="/Profil">Admin Name</router-link></div>
          </div>
        </div>
    </div>
</template>

<script>
export default {
  name: 'DashboardNavBar',
  data() {
    return {
    };
  },
  methods: {
    toggleSideBar() {
      this.$store.commit('toggleSideBar');
    },
  },
};
</script>

<style lang="scss" scoped>

</style>
