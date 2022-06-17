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
                        <DelivererDelivery v-if="this.$store.state.TableName === 'Delivery'"/>
                        <OrdersHistory v-if="$store.state.TableName === 'OrdersHistory'"/>
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
import DelivererDelivery from '@/components/tables/DelivererDelivery.vue';
import OrdersHistory from '@/components/tables/OrdersHistory.vue';
export default {
    name: "DelivererDashboardview",
    components: { NavBar, DelivererDashboardSideBar, DelivererDelivery, OrdersHistory },
    data() {
        return {
            //
        };
    },
    mounted() {
        this.$store.commit("changeTableName", "Delivery");
    },
};
</script>
