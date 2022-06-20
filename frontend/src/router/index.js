import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'

const routes = [
  {
    path: "/",
    name: "home",
    meta: {
      loginAdmin: true,
      loginDeliverer: true,
    },
    component: HomeView,
  },
  {
    path: "/category",
    name: "category",
    meta: {
      loginAdmin: true,
      loginDeliverer: true,
    },
    component: () => import("../views/CategoryView.vue"),
  },
  {
    path: "/Login",
    name: "Login",
    meta: {
      toLogin: true,
      loginAdmin: true,
      loginDeliverer: true,
    },
    component: () => import("../views/LoginView.vue"),
  },
  {
    path: "/Register",
    name: "Register",
    meta: {
      toLogin: true,
      loginAdmin: true,
      loginDeliverer: true,
    },
    component: () => import("../views/RegisterView.vue"),
  },
  {
    path: "/Dashboard",
    name: "Dashboard",
    meta: {
      requireAdmin: true,
    },
    component: () => import("../views/DashboardView.vue"),
  },
  {
    path: "/Cart",
    name: "Cart",
    meta: {
      requiresAuth: true,
      loginAdmin: true,
      loginDeliverer: true,
    },
    component: () => import("../views/CartView.vue"),
  },
  {
    path: "/Category/:name",
    name: "categories",
    meta: {
      loginAdmin: true,
      loginDeliverer: true,
    },
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
      loginAdmin: true,
      loginDeliverer: true,
    },
    component: () => import("../views/CheckoutView.vue"),
  },
  {
    path: "/Deliverer_Dashboard",
    name: "DelivererDashboard",
    meta: {
      requireDeliverer: true,
      loginAdmin: true,
    },
    component: () => import("../views/DelivererDashboardview.vue"),
  },
  {
    path: "/About",
    name: "About",
    meta: {
      loginAdmin: true,
      loginDeliverer: true,
    },
    component: () => import("../views/AboutView.vue"),
  },
];


const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

router.beforeEach((to,_, next) => {
  if (to.meta?.requiresAuth && !localStorage.getItem("id")) next({path: "/login"});
  if(to.meta?.toLogin && localStorage.getItem("id")) next({path: "/"});
  if (to.meta?.requireAdmin && !localStorage.getItem("admin"))next({ path: "/login" });
  if (to.meta?.loginAdmin && localStorage.getItem("admin"))next({ path: "/Dashboard" });
  if(to.meta?.toLogin && localStorage.getItem("id")) next({path: "/"});
  if (to.meta?.requireDeliverer && !localStorage.getItem("deliverer"))next({ path: "/login" });
  if (to.meta?.loginDeliverer && localStorage.getItem("deliverer"))next({ path: "/Deliverer_Dashboard" });
  next();
});

export default router
