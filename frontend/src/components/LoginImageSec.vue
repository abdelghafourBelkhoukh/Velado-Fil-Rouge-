<template>
    <div class="section-image">
        <div class="md:bg-black md:w-100 md:h-full opacity-30">
        </div>
        <div class="loginContainer absolute w-full h-auto flex justify-center top-[14rem]">
            <div class="loginForm bg-white sm:w-2/3 md:w-2/4 xl:w-1/3 h-auto flex justify-start flex-col px-8 py-14 rounded-lg shadow-xl">
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
            axios
                .post("http://localhost/fil-rouge/backend/Api/Customer/Login.php", this.userData)
                .then((response) => {
                    console.log(response);
                    if (response.data.success) {
                        localStorage.setItem("id", response.data.UserData.id);
                        localStorage.setItem("frirstName", response.data.UserData.firstname);
                        localStorage.setItem("lastName", response.data.UserData.lastname);
                        localStorage.setItem("email", response.data.UserData.email);
                        localStorage.setItem("type", response.data.UserData.type);
                        this.$router.push("/");
                    } else {
                        alert("Wrong Email or Password");
                    }
                })
                .catch((error) => {
                    console.log(error);
                });
        },
    },
}
</script>

<style lang="scss" scoped>
.section-image{
    background-image: url("../assets/images/registerImage.jpg");
    // background-color: aquamarine;
    background-size: cover;
    background-position: center;
    height: 85vh;
    .loginContainer{
        .loginForm{
            input{
                background-color: #EDF2F7;
            }
        }
    }
}


</style>
