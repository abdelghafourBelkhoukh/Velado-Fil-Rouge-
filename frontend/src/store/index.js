import { ref } from "vue";
import { createStore } from "vuex";
import axios from "axios";

export default createStore({
  state: {
    //cart
    alertCart: "",
    cartData: [],
    //uesr info
    user: {
      id: localStorage.getItem("id") || "",
      firstname: localStorage.getItem("firstName") || "",
      lastname: localStorage.getItem("lastName") || "",
      email: localStorage.getItem("email") || "",
    },
    //uesr info
    showSideBar: false,
    TableName: "Dashboard",
    //product page
    showProductPage: false,
    //user
    users: [],
    popupUser: false,
    popupUpdateUser: false,
    userData: {},
    //product
    products: [],
    popupProduct: false,
    popupUpdateProduct: false,
    productData: {},
    productsData: [],
    BestProduct: [],
    BestSells: [],
    BestOffer: [],
    //------------
    //quantity
    popupQuantity: false,
    dataQuantity: {},
    //------------

    //deliverer
    deliverers: [],
    popupDeliverer: false,
    PopupUpdateDeliverer: false,
    delivererData: {},
    //------------
    //category
    categories: [],
    popupCategory: false,
    popupUpdateCategory: false,
    categoryData: {},
    caregoryName: "All Products",
    //------------
    //search
    search: false,
    searchResult: [],
    //search bar dashboard
    SreachBarTable: "",
    SearchDashboardData: [],
  },
  getters: {},
  mutations: {
    toggleSideBar(state) {
      state.showSideBar = !state.showSideBar;
    },
    changeTableName(state, Name) {
      state.TableName = Name;
      if (window.innerWidth <= 768) state.showSideBar = !state.showSideBar;
    },
    logout(state) {
      localStorage.removeItem("id");
      window.location.href = "/";
    },
    // start User
    GetUsers(state, users) {
      state.users = users;
      state.SearchDashboardData = state.users;
    },
    popupUser(state) {
      state.popupUser = !state.popupUser;
    },
    popupUpdateUser(state) {
      state.popupUpdateUser = !state.popupUpdateUser;
    },
    UpdateUser(state, id) {
      state.users.forEach((user) => {
        if (user.id == id) {
          state.userData = user;
        }
      });
    },
    // end User

    // start Product
    GetProducts(state, products) {
      state.products = products;
      state.SearchDashboardData = state.products;
    },
    GetAllProducts(state) {
      state.productsData = state.products;
      state.caregoryName = "All Products";
    },
    popupProduct(state) {
      state.popupProduct = !state.popupProduct;
    },
    popupUpdateProduct(state) {
      state.popupUpdateProduct = !state.popupUpdateProduct;
    },
    UpdateProduct(state, id) {
      state.products.forEach((product) => {
        if (product.id == id) {
          state.productData = product;
        }
      });
    },
    GetProductsByCategory(state, category) {
      state.caregoryName = category;
      state.productsData = state.products.filter(
        (product) => product.category == category
      );
    },
    filterProducts(state, products) {
      let i = 0;
      state.BestProduct = products.filter(
        (product) => product.bestProduct == 1 && i++ < 3
      );
      i = 0;
      state.BestSells = products.filter(
        (product) => product.bestSells == 1 && i++ < 3
      );
      i = 0;
      state.BestOffer = products.filter(
        (product) => product.bestOffer == 1 && i++ < 3
      );
    },
    showProductPage(state) {
      console.log("i'm here");
      state.showProductPage = !state.showProductPage;
    },
    // end Product

    // start Quantity
    popupQuantity(state) {
      state.popupQuantity = !state.popupQuantity;
    },
    getQuantity(state, id) {
      state.products.forEach((product) => {
        if (product.id == id) {
          state.dataQuantity = product;
        }
      });
    },
    // end Quantity

    // start Deliverer
    GetDeliverers(state, deliverers) {
      state.deliverers = deliverers;
      state.SearchDashboardData = state.deliverers;
    },
    popupDeliverer(state) {
      state.popupDeliverer = !state.popupDeliverer;
    },
    popupUpdateDeliverer(state) {
      state.PopupUpdateDeliverer = !state.PopupUpdateDeliverer;
    },
    UpdateDeliverer(state, id) {
      state.deliverers.forEach((deliverer) => {
        if (deliverer.id == id) {
          state.delivererData = deliverer;
        }
      });
    },

    // end Deliverer
    // start Category
    GetCategories(state, categories) {
      state.categories = categories;
      state.SearchDashboardData = state.categories;
    },
    popupCategory(state) {
      state.popupCategory = !state.popupCategory;
    },
    popupUpdateCategory(state) {
      state.popupUpdateCategory = !state.popupUpdateCategory;
    },
    UpdateCategory(state, id) {
      state.categories.forEach((category) => {
        if (category.id == id) {
          state.categoryData = category;
        }
      });
    },
    // end Category
    //add to cart
    addToCart(state, dataCart) {
      axios
        .post(
          "http://localhost/fil-rouge/backend/Api/Cart/CartController.php",
          {
            userID: state.user.id,
            productID: dataCart.id,
            quantity: dataCart.qty || null,
          }
        )
        .then((res) => {
          state.alertCart = res.data.message;
          setTimeout(() => {
            state.alertCart = "";
          }, 5000);
          if (dataCart.page) state.showProductPage = !state.showProductPage;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    getCart(state, cartData) {
      state.cartData = cartData[0];
      console.log(state.cartData);
    },
    deleteFromCart(state, id) {
      //filter the product by id
      state.cartData = state.cartData.filter((product) => {
        return product.productID !== id;
      });
    },

    //search
    Search(state, searchData) {
      if (state.productsData.length > 0) {
        state.searchResult = state.productsData.filter((product) =>
          product.name.toLowerCase().includes(searchData.toLowerCase())
        );
      } else {
        state.searchResult = state.products.filter(
          (product) =>
            product.name.toLowerCase().includes(searchData.toLowerCase()) ||
            product.category.toLowerCase().includes(searchData.toLowerCase())
        );
      }
    },
    //search bar dashboard
    SearchDashboard(state, searchData) {
      switch (state.SreachBarTable) {
        case "Products":
          state.SearchDashboardData = state.products.filter((product) =>
            product.name.toLowerCase().includes(searchData.toLowerCase())
          );
          break;
        case "Users":
          state.SearchDashboardData = state.users.filter(
            (user) =>
              user.firstname.toLowerCase().includes(searchData.toLowerCase()) ||
              user.lastname.toLowerCase().includes(searchData.toLowerCase()) ||
              user.email.toLowerCase().includes(searchData.toLowerCase())
          );
          break;
        case "deliverers":
          state.SearchDashboardData = state.deliverers.filter(
            (deliverer) =>
              deliverer.firstname
                .toLowerCase()
                .includes(searchData.toLowerCase()) ||
              deliverer.lastname
                .toLowerCase()
                .includes(searchData.toLowerCase()) ||
              deliverer.email.toLowerCase().includes(searchData.toLowerCase())
          );
          break;
        case "categories":
          state.SearchDashboardData = state.categories.filter((category) =>
            category.name.toLowerCase().includes(searchData.toLowerCase())
          );
          break;
        case "Stock":
          state.SearchDashboardData = state.products.filter((product) =>
            product.name.toLowerCase().includes(searchData.toLowerCase())
          );
          break;
        default:
          break;
      }
    },
  },
  actions: {
    // start User
    async GetUsers({ commit }) {
      axios
        .get(
          "http://localhost/fil-rouge/backend/Api/gestionClient/ClientController.php"
        )
        .then((res) => {
          commit("GetUsers", res.data);
        })
        .catch((err) => {
          console.log(err);
        });
    },
    // end User

    // start Product
    async GetProducts({ commit }) {
      axios
        .get(
          "http://localhost/fil-rouge/backend/Api/Product/ProductController.php"
        )
        .then((res) => {
          commit("GetProducts", res.data);
          commit("filterProducts", res.data);
        })
        .catch((err) => {
          console.log(err);
        });
    },
    // end Product
    // start Deliverer
    async GetDeliverers({ commit }) {
      axios
        .get(
          "http://localhost/fil-rouge/backend/Api/gestionDeliverer/DelivererController.php"
        )
        .then((res) => {
          commit("GetDeliverers", res.data[0]);
        })
        .catch((err) => {
          console.log(err);
        });
    },
    // end Deliverer
    // start Category
    async GetCategories({ commit }) {
      axios
        .get(
          "http://localhost/fil-rouge/backend/Api/category/CategoryController.php"
        )
        .then((res) => {
          commit("GetCategories", res.data[0]);
        })
        .catch((err) => {
          console.log(err);
        });
    },
    // end Category
    //cart
    async getCart({ commit }) {
      axios
        .get(
          "http://localhost/fil-rouge/backend/Api/Cart/CartController.php?id=" +
            this.state.user.id
        )
        .then((res) => {
          commit("getCart", res.data);
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
});
