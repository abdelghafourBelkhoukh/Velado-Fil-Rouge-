<template>
    <aside id="sidebar" class="bg-side-nav  md:w-1/6 lg:w-1/6 border-r border-side-nav absolute md:block lg:block md:static bg-white w-full h-full md:h-auto ">
        <div class="flex flex-col h-full justify-between">
                <ul class="list-reset flex flex-col cursor-pointer">
                    <li class=" w-full h-full py-3 px-2 border-b border-light-border bg-white" @click="TableName = changeTable('Delivery')">
                        <div 
                            class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fa-solid fa-user float-left mx-2 mt-1"></i>
                            Delivery
                            <span ><i class="fas fa-angle-right float-right mt-1 "></i></span>
                        </div>
                    </li>
                    <li class=" w-full h-full py-3 px-2 border-b border-light-border bg-white" @click="TableName = changeTable('OrdersHistory')">
                        <div 
                            class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fa-solid fa-user float-left mx-2 mt-1"></i>
                            Delivery History
                            <span ><i class="fas fa-angle-right float-right mt-1 "></i></span>
                        </div>
                    </li>
                </ul>
                <div class="logout md:flex  items-end">
                    <button class="bg-white text-red-500 font-bold py-2 px-4 mb-12 rounded-full" @click="logout">
                        <i class="fas fa-sign-out-alt mr-2"></i>
                        Logout
                    </button>
                </div>
            </div>
            </aside>
</template>

<script>
export default{
    name:'DashboardSideBar',
    data(){
        return{
            TableName:'Dashboard'
        }
    },
    methods:{
        changeTable(TableName){
            this.$store.commit('changeTableName',TableName);
        },
        logout(){
            this.$store.commit('logout');
        }
    }

}

</script>