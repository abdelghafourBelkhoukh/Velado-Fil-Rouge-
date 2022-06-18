<template>
    <div class="">
      <div class="nav-menu flex-col w-full md:flex-row py-2">
        <div class="hamberger h-[10vh] w-full flex items-center justify-between md:w-2/5 ">
          <div class="logo w-auto ml-10 "><router-link to="/" ><img src="../../assets/images/logo.png" alt=""></router-link></div>
            <div class="flex items-center justify-between w-28 md:w-auto ">
              <router-link to="/Cart" class="block md:hidden text-2xl" ><i class="fa-solid fa-shopping-cart md:block px-4"></i></router-link>
              <i class="fa-solid fa-bars text-2xl" @click="showMenu()"></i>
            </div>
        </div>
        <div
            class="nav-content bg-black md:w-3/5 w-[110%] "
            :class="this.showMobileMenu ? 'open-menu' : 'closed-menu'">
            <!-- // Menu content -->
            <!-- //Here can be a logo -->
            <ul class="nav-items flex md:w-80 justify-between w-full bg-black pt-10 md:pt-0">
            <li><router-link to="/">Home</router-link></li>
            <li><router-link to="/About">About</router-link></li>
            <li>Contact</li>
            <!-- <li><router-link to="/Dashboard">Dashboard</router-link></li> -->
            </ul>
            <div class="login-signup-button flex w-full items-center flex-col md:flex-row md:justify-end bg-black pb-10 md:pb-0 md:pr-8">
              <!--cart icon-->
              <div v-if="logged">
                <button class="btn btn-primary md:mr-4 px-4 py-2 rounded md:bg-white md:hover:bg-black md:text-black text-white md:hover:text-white font-medium" @click="logout">Log out</button>
              </div>
              <div v-if="!logged">
                <a href="" class="px-2"><router-link to="/Login">Login</router-link></a>
                <a href="" class="px-2"><router-link to="/Register">Sign up</router-link></a>
              </div>
              <router-link to="/Cart" class="hidden md:block text-2xl"><i class="fa-solid fa-shopping-cart md:block px-4"></i></router-link>
            </div>
        </div>
        </div>
    </div>
</template>

<script>
import { computed } from '@vue/reactivity';
export default {
  name: 'NavBar',
  data() {
    return {
      showMobileMenu: false,
      logged : computed(() => {
        return this.$store.state.logged
      })
    };
  },
  methods: {
    showMenu() {
        this.showMobileMenu = !this.showMobileMenu;
    },
    logout() {
      this.$store.commit('logoutUser')
    }
  },
};
</script>

<style lang="scss" scoped>
.nav-menu {
  background-color: black;
  color: white;
  display:flex;
  justify-content: space-between;
}

.nav-content {
  display: flex;
  justify-content: space-between;
  // padding: 10px 30px;
  align-items: center;
  // width: 60%;
  .logo{
      img{
            width: 100px;
      }

  }
}
.nav-items {
  align-items: center;
  list-style: none;
  margin: 0;

  li {
    padding: 0 10px;
  }
}
.hamberger{

    i {
        display: none;
      }
}
// Mobile version - hidden hamburger menu
@media screen and (max-width: 768px) {
  .nav-menu {
    padding-top: 10px;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding:0 10px;
  }
  .open-menu {
    display: block;
    transform: translateX(0);
    transition: all 0.5s ease-out;
    height: 0;
  }
  .closed-menu {
    transform: translateX(-104%);
    display: none;
    padding: 0;
    height: 0;
    transition: all 0.5s ease-out;
  }
  .nav-content {
    flex-direction: column;
    z-index: 10000;
  }
  .nav-items {
    flex-direction: column;
  }
  .hamberger{

    i {
      display: block;
      text-align: right;
      padding-right:10px;
    }
  }
}
</style>
