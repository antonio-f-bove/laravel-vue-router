<template>
  <header class="">
    <ul class="flex gap-3 items-center">
      <li>
        <router-link :to="{ name: 'posts.index' }">
          Posts
        </router-link>
      </li>
      <li>
        <router-link :to="{ name: 'contact' }">
          Contact
        </router-link>
      </li>
    </ul>
  </header>
</template>

<script>
export default {

}
</script>

<style lang="scss" scoped>
// @import '../../sass/variables';

// .container {
//   height: 9rem;
//   position: fixed;

// }
</style>