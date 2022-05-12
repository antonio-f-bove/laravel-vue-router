<template>
  <div>
    <div class="container py-6">
      <!-- posts grid -->
      <div v-if="postsLoaded" class="grid grid-cols-3 lg:grid-cols-4 gap-6 mb-4">
        <post-card v-for="post in posts" :key="post.id" :post="post" />
      </div>
      <div v-else>
        <!-- TODO add loader -->
        LOADING
      </div>

      <!-- pagination dots -->
      <!-- TODO make it a component, needs more logic -->
      <div class="flex justify-center gap-4">
        <navigation-dots v-for="n in pages.last" :key="n" :n="n" :pages="pages"
        @click.native="fetchPosts(n)"
        />
      </div>
    </div>
  </div>
</template>

<script>
import NavigationDots from '../components/NavigationDots.vue';
import PostCard from '../components/PostCard.vue';

export default {
  components: {
    PostCard,
    NavigationDots,
  },
  data() {
    return {
      posts: null,
      postsLoaded: false,
      pages: {
        current: 0,
        last: 0,
      },
    }
  },
  methods: {
    fetchPosts(page = 1) {
      axios
        .get('http://127.0.0.1:8000/api/posts', { params: { page: page } })
        .then(response => {
          
          const { data, current_page, last_page } = response.data.posts;

          this.posts = data;
          this.pages.last = last_page;
          this.pages.current = current_page;

          this.postsLoaded = true
      })
      .catch(err => {
        console.warn('Error', err.message);
      });
    },
  },
  beforeMount() {
    this.fetchPosts();
  }
}
</script>

<style>

</style>