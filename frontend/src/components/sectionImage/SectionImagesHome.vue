<template>
    <div class="section-image hidden md:block ">
        <div class="md:bg-black md:w-100 md:h-full md:opacity-60">
        </div>
            <div class="container md:text-white md:absolute md:top-[30vh] animate__animated animate__backInLeft">
                <div class="text ml-32 ">
                    <h1 class="font-bold text-5xl">Faites vos courses sans stress</h1>
                    <p class="text-2xl font-normal leading-loose">Site N° 1 pour la livraison de légumes et de fruits ...</p>
                </div>
            <div class="ml-32 mt-20" v-if="!isLoggedIn">
                <router-link to="/Register"><button class="inline-block px-8 py-3 border-2 bg-white hover:border-white text-gray-800  font-medium text-lg leading-tight uppercase rounded hover:bg-opacity-50 focus:outline-none focus:ring-0 transition duration-150 ease-in-out">Sign up</button></router-link>
            </div>
        </div>
    
    </div> 
</template>

<script>

import 'animate.css';
export default {
    name: "SectionImages",
    data() {
        return {};
    },
    computed: {
        isLoggedIn() {
            return this.$store.state.logged;
        },
    },

}
</script>

<style lang="scss" scoped>
.section-image{
    background-image: url("../../assets/images/secImage.jpg");
    // background-color: aquamarine;
    background-size: cover;
    background-position: center;
    height: 85vh;
}
</style>
