<template>
    <!-- Card Sextion Starts Here -->
                        <div class="px-6 py-2 border-b border-light-grey flex justify-between items-center">
                            <div class="text-red-700 text-2xl font-bold">Categories</div>
                            <div class="flex justify-end">
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" @click="popupCategory">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                    <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2 h-auto overflow-x-scroll xl:overflow-hidden">
                        <!-- card -->
                        <div class="rounded overflow-hidden shadow bg-white mx-5 h-auto xl:w-full w-[60rem]">
                            <div class="table-responsive">
                                <table class="table text-grey-darkest text-center w-full h-full">
                                    <thead class="bg-black text-white text-normal">
                                    <tr class="py-2 h-12">
                                        <th scope="col">Name</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="item in $store.state.categories" class="border-b">
                                        <td class="py-4">{{item.name}}</td>
                                        <td class="py-4">
                                            <div class="flex flex-row justify-center">
                                                <div class="flex flex-row justify-center">
                                                    <button @click="UpdateCategory(item.id)">
                                                        <a href="#" class="text-grey-darkest hover:text-grey-dark px-2">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                    </button>
                                                    <button @click="DeleteCategoty(item.id)">
                                                        <a href="#" class="text-grey-darkest hover:text-grey-dark px-2">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </a>
                                                    </button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /card -->

                    </div>
                    <!-- /Cards Section Ends Here -->
</template>

<script>
import axios from 'axios'
export default{
    name:'Categories',
    data(){
        return{
            //
        }
    },
    methods:{
        popupCategory(){
            this.$store.commit('popupCategory')
        },
        UpdateCategory(id){
            this.$store.commit('popupUpdateCategory')
            this.$store.commit("UpdateCategory",id)
        },
        //succes
        DeleteCategoty(id){
            if(!confirm('Are you sure you want to delete this category?')) return;
            axios.delete('http://localhost/fil-rouge/backend/Api/category/CategoryController.php?id='+id)
            .then(response => {
                console.log(response.data);
                this.$store.dispatch("GetCategories")
            })
            .catch(error => {
                console.log(error)
            })
        }
    },
}
</script>