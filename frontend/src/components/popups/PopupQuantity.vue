<template>
    <!--model popup tailwind-->
    <div class=" fixed bg-black opacity-50 w-screen h-screen top-0 left-0 z-10" @click="popupQuantity"></div>
    <div class="flex items-center justify-center absolute  w-screen h-screen ">
        <div class="modal z-30  bg-white md:w-1/3 px-4 py-8 rounded" id="modal-user" tabindex="-1" role="dialog" aria-labelledby="modal-user" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header ">
                        <button @click="popupQuantity" class="w-full text-right">
                            <span class="text-3xl text-red-500 font-bold" aria-hidden="true" >&times;</span>
                        </button>
                        <h5 class="modal-title  pb-8 text-xl font-medium text-center" id="modal-user">Add Quantity</h5>
                    </div>
                    <div class="modal-body">
                        <!--input add user-->
                        <div class="flex flex-col">
                            <div class="flex flex-col">
                                <label for="FirstName" class="text-sm text-gray-600">Enter the quantity</label>
                                <input type="number" min="0" class="w-full p-2 border-2 border-gray-400 rounded-lg" id="FirstName" v-model="Quantity">
                            </div>
                        </div>
                    </div>
                    <!--button close and save-->
                    <div class="modal-footer w-full pt-6 flex justify-end">
                        <button type="button" class="px-3 py-2 bg-black hover:bg-green-700 text-white rounded" @click="addQuantity()">Save</button>
                        <button type="button" class=" bg-black hover:bg-red-700 px-3 py-2 text-white rounded ml-4" data-dismiss="modal" @click="popupQuantity">Close</button>
                    </div>
                </div>
            </div>
        </div>
        </div>
</template>

<script>

import axios from 'axios';

export default{
    name:'PopupQuantity',
    data(){
        return{
            stock:{
                quantity:this.$store.state.dataQuantity.quantity,
            },
            Quantity:0,
            newStock:{
                id:this.$store.state.dataQuantity.id,
                quantity:'',
            }
        }
    },
    methods:{
        popupQuantity(){
            this.$store.commit('popupQuantity');
        },
        addQuantity(){
            this.newStock.quantity = this.Quantity + this.stock.quantity;
            if(!confirm("If you add a quantity, you will not be able to change it.")){
                this.popupQuantity();
                return;
            } 
            axios.put('http://localhost/fil-rouge/backend/Api/Stock/StockController.php',this.newStock)
            .then(response => {
                console.log(response.data);
                this.$store.dispatch("GetProducts")
                this.popupQuantity();
            })
        }
    }
}


</script>


