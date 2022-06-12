<template>
        <div class="searchBar flex w-full justify-center pt-12 md:absolute md:top-[75vh] animate__animated animate__backInRight">
            <input class="border rounded-l-xl md:w-[40%] pl-5" type="text" placeholder="write here.." @input="Search" v-model="searchWord">
            <div class="searchButton rounded-r-xl py-2 px-5">
                <i class="fa fa-search cursor-pointer" @click="Search"></i>
            </div>
        </div>
</template>

<script>    
import 'animate.css';
export default {
    name: 'SearchBar',
    data() {
        return {
            searchWord: '',
        }
    },
    methods: {
        Search() {
            //execute showSearch function in store one time 
            if(this.searchWord === '') {
                    this.$store.state.search = false
            }
            else {
                this.$store.state.search = true
                this.$store.commit('Search', this.searchWord)
            }
        },
    },
    
};

</script>

<style lang="scss" scoped>
    // display: flex;
    // justify-content: center;
    .searchBar{
        .searchButton{
            background-color: #8CB354;
            i{
                font-size: 1.5rem;
            }
        }
    }

</style>