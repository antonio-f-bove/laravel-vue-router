import Vue from "vue"
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import HomePage from '../pages/HomePage.vue'
import ContactPage from '../pages/ContactPage.vue'
import Posts from '../pages/Posts.vue'
import Post from '../pages/Post.vue'
import CatchAll404 from '../pages/CatchAll404.vue'

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomePage
  },
  {
    path: '/contact',
    name: 'contact',
    component: ContactPage
  },
  {
    path: '/posts',
    name: 'posts.index',
    component: Posts
  },
  {
    path: '/posts/:slug',
    name: 'posts.show',
    component: Post
  },
  {
    path: '/*',
    name: '404',
    component: CatchAll404
  },
  // TODO fallback route -> 404
]

const router = new VueRouter({
  mode: 'history',
  routes,
})

export default router