import Vue from "vue"
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import HomePage from '../pages/HomePage.vue'
import Posts from '../pages/Posts.vue'
import Post from '../pages/Post.vue'

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomePage
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
]

const router = new VueRouter({
  mode: 'history',
  routes,
})

export default router