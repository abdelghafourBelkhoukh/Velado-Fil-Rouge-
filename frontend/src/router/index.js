import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'

const routes = [
  {
    path: "/",
    name: "home",
    component: HomeView,
  },
  {
    path: "/category",
    name: "category",
    component: () => import("../views/CategoryView.vue"),
  },
  {
    path: "/Login",
    name: "Login",
    meta: {
      toLogin: true,
    },
    component: () => import("../views/LoginView.vue"),
  },
  {
    path: "/Register",
    name: "Register",
    meta: {
      toLogin: true,
    },
    component: () => import("../views/RegisterView.vue"),
  },
  {
    path: "/Dashboard",
    name: "Dashboard",
    component: () => import("../views/DashboardView.vue"),
  },
  {
    path: "/Cart",
    name: "Cart",
    meta: {
      requiresAuth: true,
    },
    component: () => import("../views/CartView.vue"),
  },
  {
    path: "/Category/:name",
    name: "categories",
    component: () => import("../views/CategoryView.vue"),
  },
  {
    path: "/:pathMatch(.*)*",
    name: "Notfound",
    component: HomeView,
  },
  {
    path: "/Checkout",
    name: "Checkout",
    meta: {
      requiresAuth: true,
    },
    component: () => import("../views/CheckoutView.vue"),
  },
  {
    path: "/Deliverer_Dashboard",
    name: "DelivererDashboard",
    // meta: {
    //   requiresAuth: true,
    // },
    component: () => import("../views/DelivererDashboardview.vue"),
  },
];


const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

router.beforeEach((to,_, next) => {
  if (to.meta?.requiresAuth && !localStorage.getItem("id")) next({path: "/login"});
  if(to.meta?.toLogin && localStorage.getItem("id")) next({path: "/"});
  next();
});

export default router
