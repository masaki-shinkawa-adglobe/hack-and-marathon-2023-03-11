<template>
  <NuxtLink
    :href="`/posts?${tag}`"
    tabindex="0"
    role="link"
    class="w-full max-w-xs overflow-hidden bg-base rounded-lg shadow-lg"
  >
    <img
      class="object-cover w-full aspect-square"
      :src="props.image"
      alt="avatar"
    />
    <div class="py-5 text-center bg-base">
      <span class="block text-xl font-bold text-main">{{ props.tag }}</span>
    </div>
  </NuxtLink>
</template>

<script lang="ts" setup>
interface Props {
  tag: string;
  image: string;
}

const props = defineProps<Props>();
</script>

<style scoped lang="sass"></style>
