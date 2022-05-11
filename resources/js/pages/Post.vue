<template>
  <div>
    <div v-if="postLoaded" class="">
      <div class="">
      <img class="w-full object-cover" src="https://picsum.photos/1200/300" alt="post-image">
      </div>
    </div>
    <div v-else class="text-center">
      LOADING...
    </div>

    <div class="container py-6">
      <div class="flex justify-evenly items-center mb-8">
        <div class="relative">
          <h1 class="text-6xl">
            <span class="text-amber-400">Title:</span> {{ post.title }}
          </h1>
          <h3 v-if="post.category" class="text-xl ml-48">
            <span class="text-amber-400">Category:</span> {{ post.category.name }}
          </h3>
        </div>
        <ul class="flex gap-4 flex-nowrap">
          <li v-for="tag in post.tags" :key="tag.id"
          class="bg-amber-600 inline-block rounded-full px-2 whitespace-nowrap"
          >
            {{ tag.name }}
          </li>
        </ul>
      </div>
      <div class="flex">
        <div class="columns-3 w-full"></div>
        <p class="indent-8 flex-grow">
          {{ post.content }}
        </p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      post: null,
      postLoaded: false,
    }
  },
  methods: {
    fetchPost() {
      axios
        .get(`/api/posts/${this.$route.params.slug}`)
        .then(res => {
          const { post } = res.data
          this.post = post
          this.postLoaded = true
        })
        .catch(err => {
          console.warn('Error:', err.message)
        })
    }
  },
  beforeMount() {
    this.fetchPost()
  }
}
</script>

<style>

</style>