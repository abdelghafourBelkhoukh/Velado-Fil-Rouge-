<template>

<!--popup-->
<PopUpUser v-if="$store.state.popupUser"/>
<PopUpUpdateUser v-if="$store.state.popupUpdateUser"/>
<popupAddQuantity v-if="$store.state.popupAddQuantity"/>
<PopupSubQuantity v-if="$store.state.PopupSubQuantity"/>
<PopUpProduct v-if="$store.state.popupProduct" />
<PopUpUpdateProduct v-if="$store.state.popupUpdateProduct" />
<popupDeliverer v-if="$store.state.popupDeliverer" />
<PopupUpdateDeliverer v-if="$store.state.PopupUpdateDeliverer" />
<popupCategory v-if="$store.state.popupCategory" />
<PopupUpdateCategory v-if="$store.state.popupUpdateCategory" />
<!--popup-->

<DashboardNavBar  />
<DashboardContent />
</template>

<script>
import PopUpUser from '../components/popups/PopUpUser.vue';
import DashboardNavBar  from '../components/dashboard/DashboardNavBar.vue'
import DashboardContent from '../components/dashboard/DashboardContent.vue'
import PopUpUpdateUser from '../components/popups/PopUpUpdateUser.vue';
import popupAddQuantity from '@/components/popups/PopupAddQuantity.vue';
import PopupSubQuantity from '@/components/popups/PopupSubQuantity.vue';
import PopUpProduct from '@/components/popups/PopUpProduct.vue';
import PopUpUpdateProduct from '@/components/popups/PopUpUpdateProduct.vue';
import popupDeliverer from '@/components/popups/PopupDeliverer.vue';
import PopupUpdateDeliverer from '@/components/popups/PopupUpdateDeliverer.vue';
import popupCategory from '@/components/popups/PopupCategory.vue';
import PopupUpdateCategory from '@/components/popups/PopupUpdateCategory.vue';

export default{
    name:'DashboardView',
    components: {
    DashboardNavBar,
    DashboardContent,
    PopUpUser,
    PopUpUpdateUser,
    popupAddQuantity,
    PopupSubQuantity,
    PopUpProduct,
    PopUpUpdateProduct,
    popupDeliverer,
    PopupUpdateDeliverer,
    popupCategory,
    PopupUpdateCategory
},
    data(){
        return{
            showing : false,
        }
    },
    methods:{
        //
    },
    mounted(){
        this.$store.dispatch("GetUsers")
        // this.$store.dispatch("GetProducts")
        this.$store.dispatch("GetDeliverers")    
    }
}

</script>