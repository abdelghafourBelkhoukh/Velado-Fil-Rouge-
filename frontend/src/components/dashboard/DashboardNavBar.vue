<template>
    <div class="">
        <div class="nav-menu flex flex-col w-full py-2 px-10 bg-black text-white justify-between h-[10vh]">
          <div class="h-[10vh] w-full flex items-center justify-between">
            <button @click="toggleSideBar">
              <i class="fa-solid fa-bars text-3xl" ></i>
            </button>
              <div class="logo w-auto ml-10 " v-if="delivererLogged"><router-link to="/Profil">{{deliverer.firstname + ' ' + deliverer.lastname}}</router-link></div>
              <div class="logo w-auto ml-10 " v-if="adminLogged"><router-link to="/Profil">{{admin.firstname + ' ' + admin.lastname}}</router-link></div>
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
  computed: {
    deliverer() {
      return this.$store.state.deliverer;
    },
    admin(){
      return this.$store.state.admin;
    },
    delivererLogged() {
      return this.$store.state.delivererLogged;
    },
    adminLogged() {
      return this.$store.state.adminLogged;
    },
  },
};
</script>

<style lang="scss" scoped>

</style>
