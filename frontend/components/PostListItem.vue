<template>
  <NuxtLink
    :href="`/posts/${props.id}`"
    :tabindex="props.id"
    role="link"
    class="w-full bg-base"
  >
    <img
      class="w-full max-w-md aspect-square"
      :src="props.image"
      alt="postImage" />
    <div class="text-main m-2">
      {{props.title}}
    </div>
    <!-- TODO:コメントボタン -->
    <!-- TODO:ブックマークボタン -->
    <div class="text-main text-xs m-2">
      {{props.detail}}
    </div>
  </NuxtLink>
</template>

<script lang="ts" setup>
interface Props {
  id: number;
  title: string;
  detail: string;
  image: string;
  isBookmark: boolean;
  date: string;
}
const props = defineProps<Props>();
</script>

<style scoped></style>
