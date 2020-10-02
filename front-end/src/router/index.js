import Vue from 'vue'
import VueRouter from 'vue-router'
import CreateProfile from '../components/CreateProfile.vue'
import ListProfile from '../components/ListProfile.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'List',
    component: ListProfile
  },
  {
    path: '/create',  
    name: 'CreateProfile',
    component: CreateProfile
  }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
