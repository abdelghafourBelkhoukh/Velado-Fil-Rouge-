<template>
    <div class="section-image h-auto relative">
        <div class="md:bg-black absolute top-0 left-0 md:w-full md:h-full opacity-40">
        </div>
        <div class="loginContainer  w-full h-auto flex justify-center sm:py-20 ">
            <div class="loginForm bg-white sm:w-2/3 md:w-2/4 xl:w-1/3 h-auto flex justify-start flex-col px-8 py-14 rounded-lg sm:shadow-xl z-10">
                <p class="text-gray-800 font-medium text-center">Register</p>
                <div class="">
                    <label class="block text-sm text-gray-00" for="cus_FirstName">First Name</label>
                    <input class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="cus_FirstName" name="cus_FirstName" type="text" required="" placeholder="Your First Name" aria-label="Name" v-model="UserRegister.firstName">
                </div>
                <div class="">
                    <label class="block text-sm text-gray-00" for="cus_LastName">Last Name</label>
                    <input class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="cus_LastName" name="cus_LastName" type="text" required="" placeholder="Your Last Name" aria-label="Name" v-model="UserRegister.lastName">
                </div>
                <div class="py-2">
                    <label class="block text-sm text-gray-600" for="cus_email">Email</label>
                    <input class="w-full px-5  py-2 text-gray-700 bg-gray-200 rounded" id="cus_email" name="cus_email" type="text" required="" placeholder="Your Email" aria-label="Email" v-model="UserRegister.email">
                </div>
                <div class="py-2">
                    <label class=" block text-sm text-gray-600" for="cus_email">Address</label>
                    <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="cus_email" name="cus_email" type="text" required="" placeholder="Street" aria-label="Email" v-model="UserRegister.address">
                </div>
                <div class="py-2">
                    <label class=" text-sm block text-gray-600" for="cus_email">City</label>
                    <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="cus_email" name="cus_email" type="text" required="" placeholder="City" aria-label="Email" v-model="UserRegister.city">
                </div>
                <div class="flex">
                    <div class="inline-block mt-2 w-1/2 pr-1">
                        <label class=" block text-sm text-gray-600" for="cus_email">Country</label>
                        <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="cus_email" name="cus_email" type="text" required="" placeholder="Country" aria-label="Email" v-model="UserRegister.country">
                    </div>
                    <div class="inline-block mt-2 -mx-1 pl-1 w-1/2">
                        <label class=" block text-sm text-gray-600" for="cus_email">Zip</label>
                        <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="cus_email"  name="cus_email" type="number" required="" placeholder="Zip" aria-label="Email" v-model="UserRegister.zip">
                    </div>
                </div>
                <div class="py-2">
                    <label class="block text-sm text-gray-600" for="cus_password">Password</label>
                    <input class="w-full px-5  py-2 text-gray-700 bg-gray-200 rounded" id="cus_password" name="cus_password" type="text" required="" placeholder="Your Password" aria-label="Password" v-model="UserRegister.password">
                </div>
                <div class="py-2">
                    <label class="block text-sm text-gray-600" for="cus_password_confirmation">Password Confirmation</label>
                    <input class="w-full px-5  py-2 text-gray-700 bg-gray-200 rounded" id="cus_password_confirmation" name="cus_password_confirmation" type="text" required="" placeholder="Your Password confirmation" aria-label="Password_confirmation" v-model="UserRegister.passwordConfirmation">
                </div>
                <div class="mt-4">
                    <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" @click="Register">Register</button>
                </div>
                <a class="inline-block right-0 align-baseline font-bold text-sm text-500 hover:text-blue-800 mt-4" href="login.html">
                    Already have an account ?
                </a>
            </div>
        </div>
    </div>
</template>

<script>

import axios from 'axios';

export default {
    name: "RegisterImageSec",
    data() {
        return {
            UserRegister: {
                firstName: '',
                lastName: '',
                email: '',
                address: '',
                city: '',
                country: '',
                zip: '',
                password: '',
                passwordConfirmation: '',
                type: 'Customer',
            },
            
        };
    },
    methods: {
        Register() {
            if(this.UserRegister.passwordConfirmation == this.UserRegister.password) {
                axios.post('http://localhost/fil-rouge/backend/Api/Customer/Register.php',
                {
                    "firstName":this.UserRegister.firstName,
                    "lastName":this.UserRegister.lastName,
                    "email":this.UserRegister.email,
                    "address":this.UserRegister.address,
                    "city":this.UserRegister.city,
                    "country":this.UserRegister.country,
                    "zip":this.UserRegister.zip,
                    "password":this.UserRegister.password,
                    "type":'Customer',
                })
                .then(function (response) {
                    console.log(response);
                })
                .catch(function (error) {
                    console.log(error);
                });

                this.$router.push('/login');
            }else {
                alert('Password not match');
            }

        },
    }
}
</script>

<style lang="scss" scoped>
.section-image{
    background-image: url("../assets/images/registerImage.jpg");
    @media (max-width: 639px) {
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
