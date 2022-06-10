<template>
        <div class="searchBar flex w-full justify-center pt-12 md:absolute md:top-[75vh]">
            <input class="border rounded-l-xl md:w-[40%] pl-5" type="text" placeholder="write here.."  value="">
            <div class="searchButton rounded-r-xl py-2 px-5">
                <i class="fa fa-search"></i>
            </div>
        </div>
</template>

<script>    
export default {
    name: 'SearchBar',
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