<template>
<!--Container -->
<div class="mx-auto bg-grey-400 h-[90vh]">
    <!--Screen-->
    <div class=" flex flex-col">
        <div class="flex flex-1">
        <!--Sidebar-->
        <DashboardSideBar v-if="$store.state.showSideBar"  />
        <!--/Sidebar-->
        <div class="w-full h-[90vh] overflow-y-auto">
          <!-- searchBar -->
          <div>
            <searchBarDashboard class="pt-12 pb-6" v-if="$store.state.TableName != 'Orders' && $store.state.TableName != 'OrdersHistory' && $store.state.showSideBar == false"/>
          </div>
          <!-- searchBar -->
          <!-- main -->
          <!-- <DashboardStatistic v-if="$store.state.TableName==='Dashboard'"/> -->
          <!-- main  -->
          
          <!-- tables -->
            <!-- <div v-if="$store.state.TableName === 'Dashboard'">
              <Dashboard />
            </div> -->
            <div v-if="$store.state.TableName === 'Categories' ">
              <Categories />
            </div>
            <div v-if="$store.state.TableName === 'deliverers' ">
              <deliverers />
            </div>
            <div v-if="$store.state.TableName === 'Products' ">
              <Products />
            </div>  
            <div v-if="$store.state.TableName === 'Stock' ">
              <Stock />
            </div>  
            <div v-if="$store.state.TableName === 'Users' ">
              <Users />
            </div>
            <div v-if="$store.state.TableName === 'Orders' ">
              <Orders />
            </div>
            <div v-if="$store.state.TableName === 'OrdersHistory' ">
              <OrdersHistory />
            </div>


          <!-- tables -->
          

        </div>

        </div>
          
    </div>

</div>
</template>

<script>
import DashboardStatistic from '../dashboard/DashboardStatistic.vue';
import DashboardSideBar from '../dashboard/DashboardSideBar.vue';
import Dashboard from '../tables/Dashboard.vue';
import Categories from '../tables/Categories.vue';
import Stock from '../tables/Stock.vue';
import Users from '../tables/Users.vue';
import deliverers from '../tables/deliverers.vue';
import Products from '../tables/Products.vue';
import searchBarDashboard from './searchBarDashboard/SearchBarDashboard.vue';
import Orders from '../tables/Orders.vue';
import OrdersHistory from '../tables/OrdersHistory.vue';





export default{
    name: "DashboardView",
    data() {
        return {
        };
    },
    components: {
    DashboardStatistic,
    DashboardSideBar,
    Dashboard,
    Categories,
    Stock,
    Users,
    deliverers,
    Categories,
    Products,
    searchBarDashboard,
    Orders,
    OrdersHistory
}
}

</script>