<template>
  <div class="card text-white border border-amber-400 rounded-lg overflow-hidden">
    <div class="card__img w-full">
      <img class="object-cover" src="https://picsum.photos/1200/300" alt="post-image">
    </div>
    <div class="card__body px-4 py-2">
      <div class="text-center">
        {{ post.title }}
      </div>
      .text-
    </div>
  </div>
</template>

<script>
export default {
  props: {
    post: Object,
  }
}
</script>

<style>

</style>