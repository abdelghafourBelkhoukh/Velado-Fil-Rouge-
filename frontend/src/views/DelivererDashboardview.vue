<template>
    <NavBar />
    <div class="mx-auto bg-grey-400 h-[90vh]">
    <!--Screen-->
    <div class=" flex flex-col">
        <div class="flex flex-1">
            <DelivererDashboardSideBar v-if="this.$store.state.showSideBar"/>
            <div class="w-full h-[90vh] overflow-y-auto">
                <div class="flex flex-col h-full justify-between">
                    <div class="flex flex-col h-full justify-between">
                        <DelivererOrders v-if="this.$store.state.TableName === 'Orders'"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</template>

<script>
import NavBar from '../components/dashboard/DashboardNavBar.vue';
import DelivererDashboardSideBar from '../components/dashboard/DelivererDashboardSideBar.vue';
import DelivererOrders from '../components/tables/DelivererOrders.vue';
export default {
    name: "DelivererDashboardview",
    components: { NavBar, DelivererDashboardSideBar, DelivererOrders },
    data() {
        return {
            TableName: "Orders"
        };
    },
    mounted() {
        this.$store.commit("changeTableName", "Orders");
        this.$store.dispatch("getOrders");
    },
};
</script>
