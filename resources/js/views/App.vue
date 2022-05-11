<template>
  <div class="bg-slate-600">
    <!-- TODO fix header and footer -> SPA -->
    <app-header class="fixed h-16 top-0 inset-x-0"/>

    <router-view class="h-[calc(100vh-8rem)] mt-16"></router-view>

    <app-header class="fixed h-16 bottom-0 inset-x-0" />
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
$bar-h: 4rem;

.container {

}

</style>