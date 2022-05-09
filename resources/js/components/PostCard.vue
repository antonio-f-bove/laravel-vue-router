<template>
  <div class="card">
    <div class="card-header"></div>
    <div class="card-body">
      <div class="card-title">
        {{ post.title }}
      </div>
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