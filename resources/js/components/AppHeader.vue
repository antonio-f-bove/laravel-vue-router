<template>
  <header class="bg-slate-700 flex">
    <div class="w-16">
      <!-- TODO component for logo -> adapts to page -->
    </div>

    <nav class="flex-grow flex justify-between">

      <!-- left side of navbar -->
      <ul class="flex gap-3 items-center">
          <router-link :to="{ name: 'posts.index' }" tag="li"
          class="text-2xl text-slate-800 px-2 rounded-md bg-amber-400/70
          hover:bg-amber-400 hover:shadow hover:shadow-slate-200 
          transition duration-300 ease-in-out"
          >
            Posts
          </router-link>
          <router-link :to="{ name: 'contact' }" tag="li"
          class="text-2xl text-slate-800 px-2 rounded-md bg-amber-400/70
          hover:bg-amber-400 hover:shadow hover:shadow-slate-200 
          transition duration-300 ease-in-out"
          >
            Contact
          </router-link>
      </ul>

      <!-- right side of sidebar -->
      <ul class="flex gap-3 items-center">
        <router-link :to="{ path: '/admin/home' }" tag="li"
          class="text-2xl text-slate-800 px-2 rounded-md bg-amber-400/70
          hover:bg-amber-400 hover:shadow hover:shadow-slate-200 
          transition duration-300 ease-in-out"
          >
            Login
          </router-link>
          <!-- <router-link :to="{ name: 'posts.index' }" tag="li"
          class="text-2xl text-slate-800 px-2 rounded-md bg-amber-400/70
          hover:bg-amber-400 hover:shadow hover:shadow-slate-200 
          transition duration-300 ease-in-out"
          >

          </router-link> -->
      </ul>

    </nav>
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