<template>
  <div class="container">
    <h1>Posts</h1>

    <div class="row">
      <post-card class="col-3" v-for="post in posts" :key="post.id" :post="post" />
    </div>

    <div class="d-flex justify-content-center">
      <navigation-dots v-for="n in pages.last" :key="n" />
    </div>
  </div>
</template>

<script>
import PostCard from '../components/PostCard.vue';

export default {
  components: {
    PostCard,
  },
  data() {
    return {
      posts: null,
      pages: {
        current: 0,
        last: 0,
      },
    }
  },
  methods: {
    getPosts() {
      axios
        .get('http://127.0.0.1:8000/api/posts')
        .then(response => {
          if (!response.data.success) throw new Error('Couldn\'t get any posts.');

          const { data, current_page, last_page } = response.data.posts;
          this.posts = data; // TODO come faccio ad avere solo il posts senza data
          this.pages.last = last_page;
          this.pages.current = current_page;
      });
    },
  },
  beforeMount() {
    this.getPosts();
  }
}
</script>

<style lang="scss" scoped>


</style>