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
    component: () => import("../views/LoginView.vue"),
  },
  {
    path: "/Register",
    name: "Register",
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
    component: () => import("../views/CartView.vue"),
  },
  {
    path: "/Category/:name",
    name: "categories",
    component: () => import("../views/CategoryView.vue"),
  },

  // {
  //   path: '/about',
  //   name: 'about',
  //   // route level code-splitting
  //   // this generates a separate chunk (about.[hash].js) for this route
  //   // which is lazy-loaded when the route is visited.
  //   component: () => import(/* webpackChunkName: "about" */ '../views/AboutView.vue')
  // }
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
