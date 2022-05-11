<template>
  <div>
    <!-- TODO fix header and footer -> SPA -->
    <app-header />

    <router-view></router-view>

    <footer>
      FOOTER
    </footer>
  </div>
</template>

<script>
import Posts from '../pages/Posts.vue'
import AppHeader from '../components/AppHeader.vue'

export default {
  components: {
    Posts,
    AppHeader,
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
          this.posts = data;
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