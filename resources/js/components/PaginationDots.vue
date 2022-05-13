<template>
  <span :class="[current === n ? 'bg-amber-400 text-white border-white' : '', 
  'w-10 h-10 flex items-center justify-center cursor-pointer rounded-full text-center border border-black']"
  >
    {{ n }}
  </span>
</template>

<script>
export default {
  props:{
    n: Number,
    current: {
      type: Number,
      required: false,
    },
  }
}
</script>

<style lang="scss" scoped >

</style>