<template>
    <!--model popup tailwind-->
    <div class=" fixed bg-black opacity-50 w-screen h-screen top-0 left-0 z-10" @click="popupProduct"></div>
    <div class="flex items-center justify-center absolute  w-screen h-screen ">
        <div class="modal z-30  bg-white md:w-1/3 px-4 py-8 rounded" id="modal-user" tabindex="-1" role="dialog" aria-labelledby="modal-user" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header ">
                        <button @click="popupProduct" class="w-full text-right">
                            <span class="text-3xl text-red-500 font-bold" aria-hidden="true" >&times;</span>
                        </button>
                        <h5 class="modal-title  pb-8 text-xl font-medium text-center" id="modal-user">Add Product</h5>
                    </div>
                    <div class="modal-body">
                        <!--input add user-->
                        <div class="flex flex-col">
                            <!--create input for add nameProduct and category and quantity and Price and Description and Image-->
                            <div class="flex flex-col">
                                <label for="ProductName" class="text-sm text-gray-600">Enter the name of product</label>
                                <input type="text" class="w-full p-2 border-2 border-gray-400 rounded-lg" id="ProductName" v-model="ProductData.name">
                            </div>
                            <div class="flex flex-col">
                                <label for="Category" class="text-sm text-gray-600">Enter the category of product</label>
                                <select type="text" class="w-full p-2 border-2 border-gray-400 rounded-lg" id="Category" v-model="ProductData.category">
                                    <option v-for="category in $store.state.categories" :value="category.name">{{category.name}}</option>
                                </select>
                            </div>
                            <div class="flex flex-col">
                                <label for="Quantity" class="text-sm text-gray-600">Enter the quantity of product</label>
                                <input type="number" min="0" class="w-full p-2 border-2 border-gray-400 rounded-lg" id="Quantity" v-model="ProductData.quantity">
                            </div>
                            <div class="flex flex-col">
                                <label for="Price" class="text-sm text-gray-600">Enter the price of product</label>
                                <input type="number" min="0" class="w-full p-2 border-2 border-gray-400 rounded-lg" id="Price" v-model="ProductData.price">
                            </div>
                            <div class="flex flex-col">
                                <label for="Description" class="text-sm text-gray-600">Enter the description of product</label>
                                <input type="text" class="w-full p-2 border-2 border-gray-400 rounded-lg" id="Description" v-model="ProductData.description">
                            </div>
                            <!-- select for for 3 value -->
                            <div class="flex flex-col">
                                <label for="Image" class="text-sm text-gray-600">Product rating</label>
                                <select class="w-full p-2 border-2 border-gray-400 rounded-lg" id="Image" v-model="ProductData.rank">
                                    <option value="" selected>Normal Product</option>
                                    <option value="BestOffer">Best offer</option>
                                    <option value="BestSells">Best sells</option>
                                    <option value="BestProduct">Best Products</option>
                                </select>
                            </div>
                            <div class="flex flex-col">
                                <label for="Image" class="text-sm text-gray-600">Enter the image of product</label>
                                <input type="file" name="Image" class="w-full p-2 border-2 border-gray-400 rounded-lg" id="Image" @change="imagechanged">
                                <!-- <input type="text" class="w-full p-2 border-2 border-gray-400 rounded-lg" id="Image" v-model="ProductData.image"> -->
                            </div>
                        </div>
                    </div>
                    <!--button close and save-->
                    <div class="modal-footer w-full pt-6 flex justify-end">
                        <button type="button" class="px-3 py-2 bg-black hover:bg-green-700 text-white rounded" @click="addProduct">Save</button>
                        <button type="button" class=" bg-black hover:bg-red-700 px-3 py-2 text-white rounded ml-4" data-dismiss="modal" @click="popupProduct">Close</button>
                    </div>
                </div>
            </div>
        </div>
        </div>
</template>

<script>
import axios from 'axios';

export default{
    name:'PopUpProduct',
    data(){
        return{
            ProductData:{
                name:'',
                category:'',
                quantity:'',
                price:'',
                description:'',
                image:'',
                rank:'',
            },
        }
    },
    methods:{
        popupProduct(){
            this.$store.commit('popupProduct');
        },
        addProduct(){
            const formData = new FormData();
            formData.append("name", this.ProductData.name);
            formData.append("category", this.ProductData.category);
            formData.append("quantity", this.ProductData.quantity);
            formData.append("price", this.ProductData.price);
            formData.append("description", this.ProductData.description);
            formData.append("Image", this.ProductData.image);
            formData.append("rank", this.ProductData.rank);

            axios.post('http://localhost/fil-rouge/backend/Api/Product/ProductController.php',formData)
            .then(response=>{
                console.log(response);
                this.$store.dispatch("GetProducts");
                this.$store.commit('popupProduct');
            })
        },
        imagechanged(e){
            this.ProductData.image = e.target.files[0];
            console.log(this.ProductData.image);
        }
    }
}


</script>


