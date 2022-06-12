<template>
    <!-- Card Sextion Starts Here -->
                    <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2 h-auto overflow-x-scroll xl:overflow-hidden">
                        <!-- card -->
                        <div class="rounded shadow bg-white mx-5 xl:w-full h-auto w-[60rem] ">
                            <div class="flex justify-between px-6 py-2 border-b border-light-grey">
                                <div class="text-red-700 text-2xl font-bold">Stock</div>
                                <!--popup for add -->
                                <!-- <div class="flex justify-end">
                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" @click="popupQuantity">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                    
                                </div> -->
                            </div>
                            <div class="table-responsive">
                                <table class="table text-grey-darkest text-center w-full h-full">
                                    <thead class="bg-black text-white text-normal">
                                    <tr class="py-2 h-12">
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="item in $store.state.products" class="border-b">
                                        <td class="py-4">{{item.name}}</td>
                                        <td>{{item.category}}</td>
                                        <td>{{item.quantity}}</td>
                                        <td class="py-4">
                                            <div class="flex flex-row justify-center">
                                                <div class="flex flex-row justify-center">
                                                    <button @click="popupQuantity(item.id)">
                                                        <a href="#" class="text-grey-darkest hover:text-grey-dark px-2">
                                                            <i class="fas fa-plus"></i>
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
export default{
    name:'Stock',
    data(){
        return{
            //
        }
    },
    methods:{
        popupQuantity(id){
            this.$store.commit('getQuantity',id)
            this.$store.commit('popupQuantity');
        }
    }
}




</script>