<template>
  <router-link tag="div" :to="{ name: 'posts.show', params: { slug: post.slug } }"
    class="card text-white border border-amber-400 rounded-lg overflow-hidden cursor-pointer"
  >
    <div class="card__img">
      <img class="object-cover" src="https://picsum.photos/1200/300" alt="post-image">
    </div>
    <div class="card__body px-4 py-2 text-center">
      <div class=" mb-2">
        {{ post.title }}
      </div>
      <div v-if="post.category" class="text-amber-400 mb-2 ">
        {{ post.category.name }}
      </div>
      <ul class="flex gap-2 justify-center mb-2">
        <li v-for="tag in post.tags" :key="tag.id"
        class="rounded-full bg-amber-600 px-2 text-xs whitespace-nowrap"
        >
          {{ tag.name }}
        </li>
      </ul>
    </div>
  </router-link>
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