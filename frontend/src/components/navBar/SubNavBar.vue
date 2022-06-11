<template>
<div class="flex justify-center ">
    <div  class="SubNavContainer md:w-full md:flex md:justify-center md:p-4 w-20 h-10  md:rounded-none z-[112]">
        <ul class="md:flex md:w-80 md:justify-around hidden  md:flex-column md:items-center">
            <!-- <div v-if="showCategory" class="contentList bg-black md:h-screen md:absolute md:opacity-0 md:top-0 md:z-10  md:block hidden" @click="hidDropDownList">
            </div> -->
            <li class="relative">
                <span>Categories</span>
                    <div v-if="showCategory" class="contentCategories max-w-2xl bg-white h-auto p-4 absolute z-20 flex justify-center md:block hidden">
                        <ul class="grid grid-rows-6 grid-flow-col w-auto">
                            <li class="w-auto cursor-pointer" @click="getAllProduct">All</li>
                            <li class="w-auto cursor-pointer" v-for="category in $store.state.categories" @click="getProductByCategory(category.name)" >{{category.name}}</li>
                        </ul>
                    </div>
                <i class="fa-solid fa-caret-down ml-2" @mouseover="CategorieContent()"></i>
            </li>
            <li>Orders</li>
            <li>Promos</li>
        </ul>
            <div class="flex justify-center w-full h-full items-center block md:hidden">
                <i v-if="!SubNav" class="fa-solid fa-caret-down block md:hidden" @click="SubNav=true"></i>
                <i v-if="SubNav" class="fa-solid fa-caret-up block md:hidden" @click="SubNav=false"></i>
            </div>
    </div>
    <div v-if="SubNav" class="SubNavContainer2 w-full flex justify-center p-4 block md:hidden items-center z-[111]">
        <ul class="leading-[5rem]">
            <li>
                <span>Categories</span>
                <i class="fa-solid fa-caret-down ml-2"></i>
            </li>
            <li>Orders</li>
            <li>Promos</li>
        </ul>
    </div>
</div>
</template>

<script>
export default {
  name: 'SubNavBar',
  data() {
    return {
        SubNav:false,
        showCategory:false,
        categories:[],
  }
  },
  methods: {
    CategorieContent(){
        this.showCategory=!this.showCategory;
    },
    hidDropDownList(){
        this.showCategory=false;
    },
    getProductByCategory(category){
        this.CategorieContent();
        //redirect to category page
        this.$store.commit("GetProductsByCategory",category)
        this.$router.push("/Category")
    },
    getAllProduct(category){
        this.CategorieContent();
        //redirect to category page
        this.$store.commit("GetAllProducts")
        this.$router.push("/Category")
    }
  },
}
</script>

<style lang="scss" scoped>
  .SubNavContainer{
      background-color: #B4DB7C;
      @media (max-width: 768px) {
            border-bottom-left-radius: 510px;
            border-bottom-right-radius: 510px;
      }
    }
  
  .SubNavContainer2{
      position: absolute;
      background-color: #B4DB7C;
      height: 90vh;
  }

  .contentCategories{
      border-radius: 10px;
      @media (min-width: 768px) {
            top: 33px;
            left:0%
      }
      
      ul{
          li{
                padding: 10px;
                border-bottom: 1px solid #B4DB7C;
                text-align: center;
                &:hover{
                    background-color: #B4DB7C;
                    color: white;
                }
                
          }
      }
  }
  .contentList{
    width: 100vw;
    left: 0;
    top: 17.5vh;
    }
</style>
