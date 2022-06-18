<template>
  <h1 class="text-center py-10 text-4xl font-semibold">Best Products</h1>
  <div
    class="postsContainer flex h-auto w-full md:justify-evenly flex-col lg:flex-row"
  >
    <div
      v-for="post in this.$store.state.BestProduct"
      class="post h-auto w-auto my-6"
    >
      <div class="container relative" @click="showProductPage(post.id)">
        <img
          class="absolute h-full w-full"
          :src="'/productImage/' + post.image"
          alt=""
        />
        <div class="overlay">
          <div class="items"></div>
          <div class="items head">
            <p>{{ post.name }}</p>
            <hr />
          </div>
          <div class="items price">
            <p class="new">{{ post.price }} DH/Kg</p>
          </div>
          <div class="items cart">
          <div  v-if="isLoggedIn">
            <button  @click="(e)=>addToCart(e,post.id)" class="bg-white text-black px-4 py-3 rounded-lg"><i class="fa fa-shopping-cart mr-2"></i> ADD TO CART</button>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "BestProductsPosts",
  data() {
    return {
      //
    };
  },
  mounted() {
    //
  },
  methods: {
    showProductPage(id) {
      this.$store.commit("UpdateProduct", id);
      this.$store.commit("showProductPage");
    },
    addToCart(e, id) {
      let dataCart = {
        id: id,
        qty: 1,
        page: false,
      };
      this.$store.commit("addToCart", dataCart);
      e.stopPropagation();
    },
  },
  computed: {
        isLoggedIn() {
            return this.$store.state.logged;
        },
    },
};
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
            @media (max-width: 768px){
              z-index: -1;
            }
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
  @media (max-width: 768px) {
    padding-top: 200px;
    padding-bottom: 30px;
    background-image: linear-gradient(transparent,black);
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
        opacity: 1;
      }
  }
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
  @media (min-width: 768px){
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
      opacity: 1;
    }
  }
}

.container:hover{
  @media (min-width: 768px){
    transition: all 0.5s;
    img{
        filter: brightness(0.5);
    }

  }
}
.container:hover img{
  @media (min-width: 768px){
    z-index: -1;
  }
}
</style>
