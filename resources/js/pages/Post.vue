<template>
  <div>
    <div v-if="postLoaded" class="text-center">
      {{ post.title }}
    </div>
    <div v-else class="text-center">
      LOADING...
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
    fetchPost(slug) {
      axios
        .get(`api/posts/${$route.params.slug}`)
        .then(res => {
          this.post = res.data
          this.postLoaded = true
        })
        .catch(err => {
          console.warn('Error', err.message)
        })
    }
  }
}
</script>

<style>

</style>