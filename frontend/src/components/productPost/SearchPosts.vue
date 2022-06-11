<template>
    <h1 class="text-center py-10 text-4xl font-semibold">Search result</h1>
    <div class="text-center" v-if="searchResult.length < 1">
        <p class="text-center text-xl font-semibold">No result found</p>
    </div>
    <div class="postsContainer h-auto w-full grid md:grid-cols-2 lg:grid-cols-3">
        <div v-for="post in searchResult" class="post h-auto w-auto my-6">
            <div class="container  relative" @click="showProductPage(post.id)">
                <img class="absolute w-full h-full " :src="'/productImage/' + post.image" alt="">
                <div class="overlay ">
                    <div class = "items"></div>
                    <div class = "items head">
                    <p>{{post.name}}</p>
                    <hr>
                    </div>
                    <div class = "items price">
                    <p class="new">{{post.price}} DH/Kg</p>
                    </div>
                    <div class="items cart">
                    <i class="fa fa-shopping-cart"></i>
                    <button @click="(e)=>addToCart(e,post.id)">ADD TO CART</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    name: 'SearchPosts',
    data(){
        return{
            length: 0,
        }
    },
    mounted(){
      //
    },
    computed:{
        searchResult(){
            this.length = this.$store.state.searchResult.length;
            return this.$store.state.searchResult;
        }
    },
    methods:{
        showProductPage(id){
            this.$store.commit("UpdateProduct",id);
            this.$store.commit("showProductPage");
        },
        addToCart(e,id){
            let dataCart = {
                id: id,
                qty: 1,
                page:false
            }
            this.$store.commit("addToCart", dataCart);
            e.stopPropagation();
        }
    },
    
}
</script>


<style lang="scss" scoped>

.container {
  border-radius: 12px;
  width: 300px;
  height: 400px;
  top:0; right: 0; left: 0; bottom: 0;
  margin: auto;
  background-size: cover;
  cursor: pointer;
  -webkit-box-shadow: 0 0 5px #000;
        box-shadow: 0 0 5px #000;
        img{
            border-radius: 12px;
        }
  }
.overlay {
  border-radius: 12px;
  width: 100%;
  height: 100%;
  display: grid;
  grid-template-columns: 1fr;
  grid-template-rows: 1fr 2fr 2fr 1fr;
  color: #fff;
  transition: all 0.5s;
  font-family: 'Playfair Display', serif;

}


.items {
    padding-left: 20px;
  letter-spacing: 3px;
}

.head {
    transform: translateY(40px);
  font-size: 30px;
  line-height: 40px;
  transition: all 0.6s;
  opacity: 0;
  hr {
    display: block;
    width: 0;
    
    border: none;
    border-bottom: solid 2px #fff;
    
    position: absolute;
    bottom: 0; left:20px;
    
    transition: all 0.5s;
  }
}

.price {
  font-size: 22px;
  line-height: 50px;
  font-weight: bold;  
  opacity: 0;
  transform: translateY(40px);
  transition: all 0.7s;
  .old {
    text-decoration: line-through;
    color: rgb(49, 49, 49) 40%;
  }
}

.cart {
  font-size: 12px;
  opacity: 0;
  letter-spacing: 1px;
  font-family: 'Lato', sans-serif;
  // transform: translateY(40px);
  i {
    font-size: 16px;
  }
  span {
    margin-left: 10px;
  }
}

.container:hover .overlay{
  & .head {
    transform: translateY(0px);
    opacity: 100%;
  }

  & hr {
    width: 75px;
    transition-delay: 0.4s;
  }
  
  & .price {
    transform: translateY(0px);
    transition-delay: 0.3s;
    opacity: 1;
  }
  
  & .cart {
    transform: translateY(0px);
    transition-delay: 0.3s;
    opacity: 0.5;
  }
}

.container:hover{
    transition: all 0.5s;    
    img{
        z-index: -1;
    }
    .overlay{
    background: black ;
    }
}


</style>