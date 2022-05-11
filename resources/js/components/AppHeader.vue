<template>
  <header class="container py-4">
    <ul class="flex gap-3">
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

<style>

</style>