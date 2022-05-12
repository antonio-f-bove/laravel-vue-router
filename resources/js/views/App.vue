<template>
  <div class="">
    <app-header class="fixed h-16 top-0 inset-x-0"/>

    <router-view class="bg-slate-600 h-[calc(100vh-4rem)] absolute top-16 inset-x-0 overflow-y-auto z-50"></router-view>

    <!-- <app-header class="fixed h-16 bottom-0 inset-x-0" /> -->
  </div>
</template>

<script>
// import Posts from '../pages/Posts.vue'
import AppHeader from '../components/AppHeader.vue'

export default {
  components:{
    AppHeader,
  }
}
</script>

<style lang="scss" scoped>

</style>