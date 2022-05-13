<template>
  <div>
    <!-- simple pagination -->
    <div v-if="pages.last < LIMIT_PAGES" class="flex justify-center gap-4">
      <pagination-dots v-for="n in pages.last" :key="n" :n="n" :current="pages.current"
          @click.native="fetchPosts(n)"
          />
    </div>
    
    <!-- too many pages - fragmented pagination -->
    <div v-else class="flex justify-center gap-4">
      <pagination-dots :n="1" @click.native="fetchPosts(1)" />

      <pagination-dots :n="pages.current - 1" @click.native="fetchPosts(n)" />
      <pagination-dots :n="pages.current" :current="pages.current" @click.native="fetchPosts(n)" />
      <pagination-dots :n="pages.current + 1" @click.native="fetchPosts(n)" />

      <pagination-dots :n="pages.last" @click.native="fetchPosts(n)" />
    </div>
  </div>
</template>

<script>
import PaginationDots from './PaginationDots.vue'

export default {
  components: { PaginationDots },
  props: {
    pages: Object,
  }, 
  data() {
    return {
      LIMIT_PAGES: 6,
    }
  },
  methods: {
    fetchPosts(page) {
      this.$emit('page-change', page)
    },
  }
}
</script>

<style>

</style>