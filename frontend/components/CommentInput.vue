<template>
  <div class="flex">
    <input
      type="text"
      placeholder="John Doe"
      class="flex-1 block w-full placeholder-gray-400/70 rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40"
    />
    <button
      class="px-6 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-lg hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80"
    >
      送信
    </button>
  </div>
</template>

<script lang="ts" setup>
interface Comment {
  id: number;
}

const props = defineProps<Comment>();
</script>

<style scoped lang="sass"></style>
