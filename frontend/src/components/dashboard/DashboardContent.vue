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
          <!-- main -->
          <DashboardStatistic v-if="$store.state.TableName==='Dashboard'"/>
          <!-- main  -->
          
          <!-- tables -->
            <div v-if="$store.state.TableName === 'Dashboard'">
              <Dashboard />
            </div>
            <div v-if="$store.state.TableName === 'Categories' " class="mt-12">
              <Categories />
            </div>
            <div v-if="$store.state.TableName === 'deliverers' " class="mt-12">
              <deliverers />
            </div>
            <div v-if="$store.state.TableName === 'Products' " class="mt-12">
              <Products />
            </div>  
            <div v-if="$store.state.TableName === 'Stock' " class="mt-12">
              <Stock />
            </div>  
            <div v-if="$store.state.TableName === 'Users' " class="mt-12">
              <Users />
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
    Products
}
}

</script>