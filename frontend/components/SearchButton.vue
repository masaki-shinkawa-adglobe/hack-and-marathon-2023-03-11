<script lang="ts" setup>
const emit = defineEmits(['handleClick']);
const handleClick = () => {
  emit('handleClick');
};
</script>

<template>
  <div class="flex items-center">
    <button @click="handleClick"><img src="~/assets/img/search.svg" class="w-6 h-6"></button>
  </div>
</template>

<style scoped></style>
