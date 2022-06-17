<template>
    <div>
        <div class="flex justify-center px-6 py-8">
            <div class="text-red-700 text-2xl text-center font-bold">Orders</div>
        </div>
        <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2 h-auto">
            <div class="rounded shadow bg-white  w-full h-auto">
                <div class="table-responsive">
                    <table class="table text-grey-darkest text-center w-full h-full">
                        <thead class="bg-black text-white text-normal">
                        <tr class="py-2 h-12">
                            <th scope="col">Order N°</th>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Order Date</th>
                            <th scope="col">Order Detailes</th>
                            <th scope="col">Products Detailes</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="item in OrderData" class="border-b">
                            <td class="py-4">{{item.id}}</td>
                            <td class="py-4">{{item.firstname +' '+item.lastname}}</td>
                            <td class="py-4">{{item.added_at}}</td>
                            <td class="py-4">
                                    <button class="bg-white text-black font-bold w-full rounded-full" @click="getOrderDetailsData(item.id)">
                                        <i class="fas fa-eye mr-2"></i>
                                        See more
                                    </button>
                            </td>
                            <td class="py-4">
                                    <button class="bg-white text-black font-bold w-full rounded-full" @click="getProductDetailsData(item.id)">
                                        <i class="fas fa-eye mr-2"></i>
                                        See more
                                    </button>
                            </td>
                            <td class="py-4">
                                <div class="flex justify-center">
                                    <button class="bg-white text-green-500  text-xl py-2 px-4 rounded-full" @click="acceptOrder(item.id)">
                                        <i class="fas fa-check"></i>
                                    </button>
                                    <button class="bg-white text-red-500  text-xl py-2 px-4 rounded-full" @click="refuseOrder(item.id)">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div> 
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- order details  -->
        <div v-if="showOrderDetails" class="w-full h-full bg-black opacity-60 absolute top-0 left-0"></div>
        <div v-if="showOrderDetails" class="w-full h-full absolute top-0 left-0 flex justify-center items-center">
            <div class="w-full md:w-2/3 lg:w-1/3 h-[90vh] bg-white mx-4 px-4 py-8 flex flex-col rounded-2xl">
                <!--button of close-->
                <div class="flex justify-end">
                    <button class="bg-white text-red-500 font-bold text-5xl py-2 px-4 rounded-full" @click="ShowOrderDetails">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <span class="text-center text-2xl font-semibold pb-8 ">Order details</span>
                <span class=" text-lg font-medium sm:pl-10">Customer Name :</span>
                <span class="pl-4  py-3 sm:text-center">{{OrderDetailsData.firstname +' '+OrderDetailsData.lastname}}</span>
                <span class=" text-lg font-medium sm:pl-10">Address :</span>
                <span class="pl-4  py-3 sm:text-center">{{OrderDetailsData.address +', '+OrderDetailsData.city+', '+OrderDetailsData.country}}</span>
                <span class=" text-lg font-medium sm:pl-10">Order Date :</span>
                <span class="pl-4  py-3 sm:text-center">{{OrderDetailsData.added_at}}</span>
                <span class=" text-lg font-medium sm:pl-10">Order Status :</span>
                <span class="pl-4  py-3 sm:text-center">{{OrderDetailsData.status}}</span>
                <span class=" text-lg font-medium sm:pl-10">Total Price :</span>
                <span class="pl-4  py-3 sm:text-center">{{OrderDetailsData.totalPrice}} DH</span> 
            </div>
        </div>
        <!-- products details -->
        <div v-if="showProductsDetails" class="w-full h-full bg-black opacity-60 absolute top-0 left-0"></div>
        <div v-if="showProductsDetails" class="w-full h-full absolute top-0 left-0 flex justify-center items-center">
            <div class="w-full md:w-2/3 lg:w-1/3 h-[90vh] bg-white mx-4 px-4 py-8 flex flex-col rounded-2xl">
                <!--button of close-->
                <div class="flex justify-end">
                    <button class="bg-white text-red-500 font-bold text-5xl py-2 px-4 rounded-full" @click="ShowProductsDetails">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <span class="text-center text-2xl font-semibold pb-8 ">Products details</span>
                <div>
                    <table class="table text-grey-darkest text-center w-full h-full">
                        <thead class="bg-black text-white text-normal">
                        <tr class="py-2 h-12">
                            <th scope="col">Product Name</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="border-b" v-for="item in ProductDetailsData">
                            <td class="py-4">{{item.name}}</td>
                            <td class="py-4">{{item.qty}}</td>
                            <td class="py-4">{{item.price}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="w-full h-full flex justify-center items-center mt-10">
                    <span class=" text-xl font-semibold pt-8">Total Price : {{ProductDetailsData[0].totalPrice}}</span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
export default{
    name:'DelivererOrders',
    data(){
        return{
            OrderDetailsData : {},
            ProductDetailsData : [],
            showOrderDetails:false,
            showProductsDetails:false,
        }
    },
    mounted(){
        this.$store.dispatch("getOrders");
    },
    computed:{
        OrderData(){
            let data = this.$store.state.orderData;
            let newData = [];
            let result = [];
            for(let i = 0; i < data.length; i++){
                if(newData.indexOf(data[i].id) == -1){
                    newData.push(data[i].id);
                    result.push(data[i]);
                }
            } 
            return result;
        },
        Allorders(){
            return this.$store.state.orderData;
        }
    },
    methods:{
        ShowOrderDetails(){
            this.showOrderDetails = !this.showOrderDetails;
        },
        ShowProductsDetails(){
            this.showProductsDetails = !this.showProductsDetails;
        },
        getOrderDetailsData(id){
            this.ShowOrderDetails();
            this.OrderDetailsData = this.OrderData.find(item => item.id == id);
        },
        getProductDetailsData(id){
            this.ShowProductsDetails();
            console.log(id);
            console.log(this.Allorders);
            this.ProductDetailsData = this.Allorders.filter(item => item.id == id); 

            

        },
        acceptOrder(orderID){
            axios.put("http://localhost/fil-rouge/backend/Api/Order/OrderController.php?confirmation=Accepted",{
                id:orderID,
            }).then(response => {
                console.log(response.data);
                this.$store.dispatch('getOrders');
            }).catch(error => {
                console.log(error);
            })
        },
        refuseOrder(orderID){
            axios.put("http://localhost/fil-rouge/backend/Api/Order/OrderController.php?confirmation=Refused",{
                id:orderID,
            }).then(response => {
                console.log(response.data);
                this.$store.dispatch('getOrders');
            }).catch(error => {
                console.log(error);
            })
        },
    }

}

</script>