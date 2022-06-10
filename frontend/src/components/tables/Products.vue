<template>
    <!-- Card Sextion Starts Here -->
                        <div class="flex justify-between px-6 py-2 border-b border-light-grey">
                            <div class="font-bold text-xl">Products</div>
                            <!--popup for add -->
                            <div class="flex justify-end">
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" @click="popupProduct">
                                    <i class="fas fa-plus"></i>
                                </button>
                                
                            </div>
                        </div>
                    <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2 h-auto overflow-x-scroll xl:overflow-hidden">
                        <!-- card -->
                        <div class="rounded shadow bg-white mx-5 xl:w-full h-auto w-[60rem]">
                            <div class="table-responsive">
                                <table class="table text-grey-darkest text-center w-full h-full">
                                    <thead class="bg-black text-white text-normal">
                                    <tr class="py-2 h-12">
                                        <th scope="col">Image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col" >Description</th>
                                        <th scope="col" class="w-auto">Category</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr  v-for="item in $store.state.products" class="border-b">
                                        <td class="py-4 w-40 px-4"><img class="w-full" :src="'/productImage/'+ item.image" :alt="item.image"></td>
                                        <td>{{item.name}}</td>
                                        <td>{{item.description}}</td>
                                        <td>{{item.category}}</td>
                                        <td>{{item.quantity}}</td>
                                        <td>{{item.price}}</td>
                                        <td class="py-4">
                                            <div class="flex flex-row justify-center">
                                                <div class="flex flex-row justify-center">
                                                    <button @click="UpdateProduct(item.id)">
                                                        <a href="#" class="text-grey-darkest hover:text-grey-dark px-2">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                    </button>
                                                    <button @click="DeleteProduct(item.id)">
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

import axios from 'axios';

export default{
    name:'Products',
    data(){
        return{
            UserID : '',
        }
    },
    methods:{
        popupProduct(){
            this.$store.commit('popupProduct');
        },
        DeleteProduct(id){
            if(!confirm('Are you sure you want to delete this user?')) return;
            axios.delete('http://localhost/fil-rouge/backend/Api/Product/ProductController.php?id=' + id,)
            .then(response => {
                console.log(response);
                this.$store.dispatch("GetProducts");
            })
        },
        UpdateProduct(id){
            this.$store.commit('UpdateProduct',id);
            this.$store.commit('popupUpdateProduct');
        }
    }
}




</script>