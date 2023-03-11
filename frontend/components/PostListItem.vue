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
    <div class="text-xs m-2">
      <p class="text-main">
        {{ detail.main }}
      </p>
      <NuxtLink
        v-for="hashtag in detail.hashtags"
        :href="`/posts?tags=${hashtag}`"
        class="text-blue-400 [&+&]:ml-2"
        @click="() => emit('update')"
      >
        #{{ hashtag }}
      </NuxtLink>
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
interface Emits {
(e: "update"): void
}

const props = defineProps<Props>();
const emit = defineEmits<Emits>()

const detail = computed(() => {
  const found = props.detail.match(/([\s\S.]*?)(#[\s\S.]*)/);
  if (!found) return { main: "", hashtags: [] };
  const main = found.at(1);
  console.log(main);

  const hashtag = found.at(2);
  if (!hashtag) {
    return { main, hashtags: [] };
  }
  const hashtags = hashtag
    .split("#")
    .filter((value) => value)
  return { main, hashtags };
});
</script>

<style scoped></style>
