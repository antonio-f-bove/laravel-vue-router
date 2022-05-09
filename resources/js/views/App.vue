<template>
  <div class="container">
    <h1>Posts</h1>

    <div class="row">
      <post-card class="col-3" v-for="post in posts" :key="post.id" :post="post" />
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
      posts: {},
    }
  },
  methods: {
    getPosts() {
      axios
        .get('http://127.0.0.1:8000/api/posts')
        .then(response => {
          if (!response.data.success) throw new Error('Couldn\'t get any posts.');

          const { posts, current_page, last_page } = response.data;
          this.posts = posts.data; // TODO come faccio ad avere solo il posts senza data
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