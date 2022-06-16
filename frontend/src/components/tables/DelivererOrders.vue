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
                            <th scope="col" class="hidden md:block">Order Date</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="item in orderData" class="border-b">
                            <td class="py-4">{{item.id}}</td>
                            <td class="py-4 hidden md:block">{{item.added_at}}</td>
                            <td class="py-4">
                                    <button class="bg-white text-red-500 font-bold w-full rounded-full" @click="getDetailsData(item.id)">
                                        <i class="fas fa-eye mr-2"></i>
                                        See More
                                    </button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div v-if="showDetails" class="w-full h-full bg-black opacity-60 absolute top-0 left-0"></div>
        <div v-if="showDetails" class="w-full h-full absolute top-0 left-0 flex justify-center items-center">
            <div class="w-full md:w-2/3 lg:w-1/3 h-[90vh] bg-white mx-4 px-4 flex flex-col rounded-2xl">
                <!--button of close-->
                <div class="flex justify-end">
                    <button class="bg-white text-red-500 font-bold text-5xl py-2 px-4 rounded-full" @click="ShowDetails">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <span class="text-center text-2xl font-semibold pb-4 sm:pb-8">Order details</span>
                <span class=" text-lg font-medium sm:pl-10">Order N° :</span>
                <span class="pl-4  py-3 sm:text-center">{{OrderData.firstname +' '+OrderData.lastname}}</span>
                <span class=" text-lg font-medium sm:pl-10">Address :</span>
                <span class="pl-4  py-3 sm:text-center">{{OrderData.address +', '+OrderData.city+', '+OrderData.country}}</span>
                <span class=" text-lg font-medium sm:pl-10">Order Date :</span>
                <span class="pl-4  py-3 sm:text-center">{{OrderData.added_at}}</span>
                <span class=" text-lg font-medium sm:pl-10">Order Status :</span>
                <span class="pl-4  py-3 sm:text-center">{{OrderData.status}}</span>
                <span class=" text-lg font-medium sm:pl-10">Total Price :</span>
                <span class="pl-4  py-3 sm:text-center">{{OrderData.totalPrice}} DH</span>
                <div class="flex justify-center">
                    <button class="bg-green-500 text-white font-normal text-xl py-2 px-4 rounded-xl" @click="delivered(OrderData.id)">
                        Delivered
                    </button>

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
            orderStatus : 'in progress',
            OrderData:'',
            showDetails:false,
        }
    },
    computed:{
        orderData(){
            return this.$store.state.orderData
        }
    },
    methods:{
        ShowDetails(){
            this.showDetails = !this.showDetails;
        },
        getDetailsData(id){
            console.log(id);
            this.ShowDetails();
            this.OrderData = this.$store.state.orderData.find(item => item.id == id);
        },
        delivered(id){
            axios.put("http://localhost/fil-rouge/backend/Api/Order/OrderController.php",{
                id:id,
                status:'Delivered'
            }).then(response => {
                console.log(response.data);
                this.$store.dispatch('getOrders');
                this.ShowDetails();
            }).catch(error => {
                console.log(error);
            })
        }
    }

}

</script>