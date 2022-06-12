<template>
        <div class="searchBar flex w-full justify-center md:top-[75vh] animate__animated animate__backInRight">
            <input class="border rounded-l-xl md:w-[40%] pl-5" type="text" placeholder="write here.." @input="Search" v-model="search">
            <div class="searchButton rounded-r-xl py-2 px-5">
                <i class="fa fa-search cursor-pointer" @click="Search"></i>
            </div>
        </div>
</template>

<script>    
import 'animate.css';
export default {
    name: 'SearchBarDashboard',
    data() {
        return {
            search:'' ,
        }
    },
    methods: {
        Search() {
            this.$store.commit('SearchDashboard', this.search);
        },
    },
    
};

</script>

<style lang="scss" scoped>
    // display: flex;
    // justify-content: center;
    .searchBar{
        .searchButton{
            background-color: black;
            color: white;
            i{
                font-size: 1.5rem;
            }
        }
    }

</style>