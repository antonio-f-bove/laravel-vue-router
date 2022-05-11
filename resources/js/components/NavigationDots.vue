<template>
  <span :class="[pages.current === n ? 'bg-blue-400 text-white' : '', 
  'w-10 h-10 flex items-center justify-center cursor-pointer rounded-full text-center border border-black']"
  >
    {{ n }}
  </span>
</template>

<script>
export default {
  props:{
    n: Number,
    pages: Object,
  }
}
</script>

<style lang="scss" scoped >

</style>