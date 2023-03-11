<template>
  <NuxtLink
    :href="`/posts/${props.id}`"
    role="link"
    class="w-full bg-base"
  >
    <img
      class="w-full"
      :src="props.image"
      alt="postImage" />
    <div>
      {{props.title}}
    </div>
    <div>
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
