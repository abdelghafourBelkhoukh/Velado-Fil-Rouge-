<template>
    <div class="section-image h-auto relative">
        <div class="md:bg-black absolute md:w-full md:h-full opacity-40">
        </div>
        <div class="loginContainer  w-full h-auto flex justify-center s-small:py-32">
            <div class="loginForm bg-white sm:w-2/3 md:w-2/4 xl:w-1/3 h-auto flex justify-start flex-col px-8 py-14 rounded-lg sm:shadow-xl z-10">
                <p class="text-gray-800 text-center text-lg font-bold">Login</p>
                <div class="py-2">
                    <label class="block text-sm text-gray-00 py-1" for="username">Email :</label>
                    <input class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="username" name="username" type="email" required="" placeholder="User Name" aria-label="username" v-model="userData.email">
                </div>
                <div class="py-2">
                    <label class="block text-sm text-gray-600 py-1" for="password">Password :</label>
                    <input class="w-full px-5  py-2 text-gray-700 bg-gray-200 rounded" id="password" name="password" type="password" required="" placeholder="*******" aria-label="password" v-model="userData.password">
                </div>
                <div class="mt-4 items-center justify-between">
                    <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 hover:bg-opacity-50 rounded" @click="Login">Login</button>
                    <a class="inline-block right-0 align-baseline  font-bold text-sm text-500 hover:text-blue-800 ml-4" href="">
                        Forgot Password?
                    </a>
                </div>
                <a class="inline-block right-0 align-baseline font-bold text-sm text-500 hover:text-blue-800 pt-3" href="">
                Not registered ?
                </a>
            </div>
        </div>
    </div>
</template>

<script>

import axios from 'axios';

export default {
    name: "LoginImageSec",
    data() {
        return {
            userData: {
                email: "",
                password: "",
            },
        };
    },
    methods: {
        Login() {
            this.$store.dispatch('Login', this.userData);
            this.$router.push('/');
        },
    },
}
</script>

<style lang="scss" scoped>
.section-image{
    background-image: url("../../assets/images/registerImage.jpg");
    @media (max-width: 350px) {
        background-image: none;
        
    }
    // background-color: aquamarine;
    background-size: cover;
    background-position: center;
    .loginContainer{
        .loginForm{
            input{
                background-color: #EDF2F7;
            }
        }
    }
}


</style>
