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
      alt="postImage"
    />
    <div class="flex justify-between m-2">
      <p
        class="text-main flex-1 whitespace-nowrap overflow-hidden text-ellipsis"
      >
        {{ props.title }}
      </p>
      <div class="ml-2 flex gap-2">
        <NuxtLink :href="`/posts/${id}/comments`">
          <img src="~/assets/img/comment.svg" class="w-4" />
        </NuxtLink>
        <!-- TODO:ブックマークボタン -->
      </div>
    </div>
    <p class="text-main text-xs m-2">
      {{ props.detail }}
    </p>
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
