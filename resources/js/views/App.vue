<template>
  <div>
    <!-- TODO fix header and footer -> SPA -->
    <app-header class="bg-stone-500 fixed h-16 top-0 inset-x-0"/>

    <router-view class="py-16"></router-view>

    <app-header class="bg-stone-500 fixed h-16 bottom-0 inset-x-0" />
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