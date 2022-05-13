<template>
  <div class="flex flex-col justify-center items-center">
    <h1 v-if="$route.params" class="text-9xl italic">{{ $route.params.res.status }}</h1>
    <h1 v-else class="text-9xl italic">404</h1>
    <p class="">There has been an error!</p>
  </div>
</template>

<script>
export default {

}
</script>

<style>

</style>