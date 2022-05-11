<template>
  <div>
    <!-- TODO fix header and footer -> SPA -->
    <app-header />

    <router-view></router-view>

    <footer>
      FOOTER
    </footer>
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