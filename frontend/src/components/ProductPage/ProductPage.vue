<template>
<div class="z-[999] bg-black w-full h-screen opacity-60 fixed"></div>
<div  class=" bg-white fixed z-[1000] top-0 left-0 m-10 w-[90%] md:w-[95%]">
    <!--icon to go back-->
    <div class="h-[10vh] pl-8 flex items-center" @click="showProductPage">
        <svg class="" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"/><path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"/></svg>
    </div>
    <div class="h-[80vh] w-full flex">
        <div class="h-full w-1/2">
            <!--Product image-->
            <div class="h-full w-auto px-6 pb-8">
                <img class="h-full w-full object-cover" :src="'/productImage/' + productData.image" alt="">
            </div>
        </div>
        <div class="h-full w-1/2 ">
            <div class="flex flex-col ">
                <!--Product title-->
                <div class=" pl-10  flex justify-between">
                    <span class="text-3xl font-medium">{{productData.name}}</span>
                    <span class="text-xl font-medium pr-10">{{productData.price}} DH/Kg</span>
                </div>
                <!--Product Category-->
                <span class="h text-sm font-medium pl-10 py-4">{{productData.category}}</span>
                <!--Product RATE WITH icons-->
                <div class="h-full flex justify-between pl-10">
                    <span class="h text-sm font-medium">
                        4,5
                        <i class="fas fa-star text-yellow-500"></i>
                        <i class="fas fa-star text-yellow-500"></i>
                        <i class="fas fa-star text-yellow-500"></i>
                        <i class="fas fa-star text-yellow-500"></i>
                        <i class="fas fa-star text-yellow-500"></i>
                    </span>
                </div>
            </div>
            <!--input for quantity with + and - icons-->
            <div class=" flex justify-around items-center h-28">
                <span class="text-lg font-medium">Quantity</span>
                <span class="flex justify-center items-center text-sm font-medium">
                    <i class="fas fa-minus text-gray-500" @click="minus"></i>
                    <input type="number" v-model="Qty" class="h-8 w-20 border text-center text-sm font-medium mx-2" >
                    <i class="fas fa-plus text-gray-500" @click="plus"></i>
                </span>
            </div>
            
        <!--button add to card tailwind-->
        <div class="w-full flex justify-center">
            <button class="btn bg-green-600 text-white px-8 py-4 w-3/4 rounded" @click="addToCart(productData.id)">Add To Cart</button>
        </div>
        <div class="px-10 pt-8">
            <span class="h font-medium text-lg ">Description</span>
            <p class="pt-6">
                {{productData.description}}

            </p>
        </div>
        <!-- <div class="px-10 pt-8 flex justify-around">
            <div class="bg-slate-200 h-auto w-1/3 flex flex-col items-center py-4 rounded-2xl border-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"/><path d="M20 8h-3V4H3c-1.1 0-2 .9-2 2v11h2c0 1.66 1.34 3 3 3s3-1.34 3-3h6c0 1.66 1.34 3 3 3s3-1.34 3-3h2v-5l-3-4zM6 18.5c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zm13.5-9l1.96 2.5H17V9.5h2.5zm-1.5 9c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5z"/></svg>
                <span class="hb text-lg font-medium">Free delivery</span>
                <span class="hb text-lg font-medium">24/7</span>
            </div>
            <div class="bg-slate-200 h-auto w-1/3 flex flex-col items-center py-4 rounded-2xl border-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"/><path d="M20 8h-3V4H3c-1.1 0-2 .9-2 2v11h2c0 1.66 1.34 3 3 3s3-1.34 3-3h6c0 1.66 1.34 3 3 3s3-1.34 3-3h2v-5l-3-4zM6 18.5c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zm13.5-9l1.96 2.5H17V9.5h2.5zm-1.5 9c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5z"/></svg>
                <span class="hb text-lg font-medium">Free delivery</span>
                <span class="hb text-lg font-medium">24/7</span>
            </div>
        </div> -->
        </div>
        
    </div>
</div>

</template>

<script>
export default {
    name: 'Cart',
    data(){
        return{
            productData : this.$store.state.productData,
            Qty: '1',
        }
    },
    methods:{
        showProductPage(){
            this.$store.commit("showProductPage");
        },
        plus(){
            this.Qty++;
        },
        minus(){
            if(this.Qty > 1){
                this.Qty--;
            }
        },
        addToCart(id){
            let dataCart = {
                id: id,
                qty: this.Qty,
                page:true
            }
            this.$store.commit("addToCart", dataCart);
        }
    },
}
</script>
<style>
    #summary {
    background-color: #f6f6f6;
    }
</style>