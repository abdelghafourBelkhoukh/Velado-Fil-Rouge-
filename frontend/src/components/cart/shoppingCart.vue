<template>
  <div class="container mx-auto mt-10">
    <div class="flex md:flex-row flex-col">
      <div class="w-full md:w-3/4 bg-white px-10 py-10">
        <div class="flex justify-between border-b pb-8 flex-col small:flex-row">
          <h1 class="font-semibold text-2xl">Shopping Cart</h1>
          <h2 class="font-semibold text-2xl">{{ cartData.length }} Items</h2>
        </div>
        <div class="flex mt-10 mb-5">
          <h3 class="font-semibold text-gray-600 text-xs uppercase w-2/5">
            Product Details
          </h3>
          <h3
            class="font-semibold text-gray-600 text-xs uppercase w-1/5 text-center"
          >
            Quantity
          </h3>
          <h3
            class="font-semibold text-gray-600 text-xs uppercase w-1/5 text-center"
          >
            Price
          </h3>
          <h3
            class="font-semibold text-gray-600 text-xs uppercase w-1/5 text-center"
          >
            Total
          </h3>
        </div>
        <div
          class="flex items-center hover:bg-gray-100 -mx-8 px-6 py-5"
          v-for="product in cartData"
        >
          <div class="flex w-2/5 flex-col sm:flex-row justify-center">
            <div class="w-20">
              <img
                class="h-24"
                :src="'/productImage/' + product.image"
                alt=""
              />
            </div>
            <div class="flex flex-col justify-between ml-4 flex-grow">
              <span class="font-bold text-sm">{{ product.name }}</span>
              <span class="text-red-500 text-xs">{{ product.category }}</span>
              <a
                class="font-semibold hover:text-red-500 text-gray-500 text-xs cursor-pointer"
                @click="deleteFromCart(product.productID)"
                >Remove</a
              >
            </div>
          </div>
          <div class="flex justify-center items-center w-1/5">
            <i
              class="fas fa-minus text-gray-500"
              @click="minus(product.productID)"
            ></i>

            <input
              class="mx-2 border text-center w-8"
              type="text"
              v-model="product.qty"
              @change="updateQty(product.productID, product.qty)"
            />

            <i
              class="fas fa-plus text-gray-500"
              @click="plus(product.productID)"
            ></i>
          </div>
          <span class="text-center w-1/5 font-semibold text-sm">{{
            product.price
          }}</span>
          <span class="text-center w-1/5 font-semibold text-sm">{{
            product.price * product.qty
          }}</span>
        </div>

        <a href="#" class="flex font-semibold text-indigo-600 text-sm mt-10">
          <svg
            class="fill-current mr-2 text-indigo-600 w-4"
            viewBox="0 0 448 512"
          >
            <path
              d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z"
            />
          </svg>
          Continue Shopping
        </a>
      </div>
      <div id="summary" class="w-full md:w-1/4 px-8 py-10">
        <h1 class="font-semibold text-2xl border-b pb-8">Order Summary</h1>
        <div class="flex justify-between mt-10 mb-5">
          <span class="font-semibold text-sm uppercase"
            >Items {{ cartData.length }}</span
          >
          <span class="font-semibold text-sm">{{ totalPriceItems }} DH</span>
        </div>
        <!-- <div>
          <label class="font-medium inline-block mb-3 text-sm uppercase"
            >Shipping</label
          >
          <select class="block p-2 text-gray-600 w-full text-sm">
            <option>Standard shipping - $10.00</option>
          </select>
        </div>-->
        <div class="py-10">
          <label
            for="promo"
            class="font-semibold inline-block mb-3 text-sm uppercase"
            >Promo Code</label
          >
          <input
            type="text"
            id="promo"
            placeholder="Enter your code"
            class="p-2 text-sm w-full"
          />
        </div>
        <button
          class="bg-green-500 hover:bg-green-600 rounded px-5 py-2 text-sm text-white uppercase"
        >
          Apply
        </button>
        <div class="border-t mt-8">
          <div
            class="flex font-semibold justify-between py-6 text-sm uppercase"
          >
            <span>Total cost</span>
            <span>{{ totalPriceItems }} DH</span>
          </div>
          <button
            class="bg-indigo-500 font-semibold rounded hover:bg-indigo-600 py-3 text-sm text-white uppercase w-full"
          >
            Checkout
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  name: "Cart",
  data() {
    return {
      totalPrice: "",
    };
  },
  computed: {
    cartData() {
      return this.$store.state.cartData;
    },
    totalPriceItems() {
      let total = 0;
      this.cartData.forEach((item) => {
        total += item.price * item.qty;
      });
      return total;
    },
  },
  methods: {
    plus(id) {
      //filter the product by id
      this.$store.state.cartData.filter((product) => {
        if (product.productID == id) {
          product.qty++;
          this.updateQty(id, product.qty);
        }
      });
    },
    minus(id) {
      //filter the product by id
      this.$store.state.cartData.filter((product) => {
        if (product.productID == id && product.qty > 1) {
          product.qty--;
          this.updateQty(id, product.qty);
        }
      });
    },
    updateQty(id, qty) {
      axios.put(
        "http://localhost/fil-rouge/backend/Api/Cart/CartController.php",
        {
          productID: id,
          qty: qty,
        }
      );
    },
    deleteFromCart(id) {
      this.$store.commit("deleteFromCart", id);
      axios
        .delete(
          "http://localhost/fil-rouge/backend/Api/Cart/CartController.php?id=" +
            id
        )
        .then((response) => {
          console.log(response.data);
        });
    },
  },
};
</script>
<style>
#summary {
  background-color: #f6f6f6;
}
</style>
