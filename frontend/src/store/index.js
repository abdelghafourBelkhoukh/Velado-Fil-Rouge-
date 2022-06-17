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
      address: localStorage.getItem("address") || "",
      city: localStorage.getItem("city") || "",
      zip: localStorage.getItem("zip") || "",
      country: localStorage.getItem("country") || "",
    },
    //uesr info
    showSideBar: false,
    TableName: "Users",
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
    productData: {
      id: "",
      name: "",
      price: "",
      description: "",
      image: "",
      category: "",
      rank: "",
    },
    productsData: [],
    BestProduct: [],
    BestSells: [],
    BestOffer: [],
    //------------
    //quantity
    popupAddQuantity: false,
    PopupSubQuantity: false,
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
    caregoryName: "All Categories",
    //------------
    //search
    search: false,
    searchResult: [],
    //search bar dashboard
    SreachBarTable: "",
    SearchDashboardData: [],
    //login
    logged: false,
    //order
    deliveryData: [],
    orderData: [],
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
    logoutUser(state) {
      localStorage.removeItem("id");
      localStorage.removeItem("firstName");
      localStorage.removeItem("lastName");
      localStorage.removeItem("email");
      localStorage.removeItem("address");
      localStorage.removeItem("city");
      localStorage.removeItem("zip");
      localStorage.removeItem("country");

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
      state.caregoryName = "All Categories";
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
          state.productData.id = product.id;
          state.productData.name = product.name;
          state.productData.price = product.price;
          state.productData.description = product.description;
          state.productData.image = product.image;
          state.productData.category = product.category;

          let checkRank = [
            { value: product.bestOffer, name: "bestOffer" },
            { value: product.bestSells, name: "bestSells" },
            { value: product.bestProduct, name: "bestProduct" },
          ];
          state.productData.rank = checkRank.filter(function (item) {
            return item.value == 1;
          });
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
      state.showProductPage = !state.showProductPage;
    },
    // end Product
    // start Quantity
    popupAddQuantity(state) {
      state.popupAddQuantity = !state.popupAddQuantity;
    },
    PopupSubQuantity(state) {
      state.PopupSubQuantity = !state.PopupSubQuantity;
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
    //Login
    Login(state, user) {
      state.user = user;
      state.logged = true;
    },
    getDelivery(state, delivery) {
      state.deliveryData = delivery;
    },
    getOrders(state, orders) {
      state.orderData = orders;
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
          console.log(res.data);
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
    //login
    async Login({ commit }, data) {
      axios
        .post("http://localhost/fil-rouge/backend/Api/Customer/Login.php", data)
        .then((response) => {
          console.log(response);
          if (response.data.success) {
            console.log(response.data.UserData);
            localStorage.setItem("id", response.data.UserData.id);
            localStorage.setItem("firstName", response.data.UserData.firstname);
            localStorage.setItem("lastName", response.data.UserData.lastname);
            localStorage.setItem("email", response.data.UserData.email);
            localStorage.setItem("address", response.data.UserData.address);
            localStorage.setItem("city", response.data.UserData.city);
            localStorage.setItem("zipcode", response.data.UserData.zip);
            localStorage.setItem("country", response.data.UserData.country);
            localStorage.setItem("type", response.data.UserData.type);
            commit("Login", response.data.UserData);
          } else {
            alert("Wrong Email or Password");
          }
        })
        .catch((error) => {
          console.log(error);
        });
    },
    //get orders
    async getOneOrders({ commit }) {
      axios
        .get(
          "http://localhost/fil-rouge/backend/Api/Order/OrderController.php?id=" +
            this.state.user.id
        )
        .then((res) => {
          commit("getOrders", res.data);
        })
        .catch((err) => {
          console.log(err);
        });
    },
    //get orders
    async getDelivery({ commit }) {
      axios
        .get(
          "http://localhost/fil-rouge/backend/Api/Order/OrderController.php?table=Delivery"
        )
        .then((res) => {
          commit("getDelivery", res.data[0]);
          console.log(res.data[0]);
        })
        .catch((err) => {
          console.log(err);
        });
    },
    async getOrders({ commit }) {
      axios
        .get(
          "http://localhost/fil-rouge/backend/Api/Order/OrderController.php?table=Orders"
        )
        .then((res) => {
          commit("getOrders", res.data[0]);
          console.log(res.data[0]);
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
});
