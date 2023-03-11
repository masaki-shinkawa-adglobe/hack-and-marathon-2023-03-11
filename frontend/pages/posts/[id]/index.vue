<template>
  <div>
    <Header />
    <Carousel ref="carousel" :items-to-show="1" class="bg-main">
      <slide v-for="image in data.images" :key="image.base64">
        <div class="h-[calc(100vh_-_56px)] w-screen flex items-center bg-main">
          <LikeButton
            class="absolute top-1 right-1"
            :is-like="image.isLike"
            @click="handleLike"
          />
          <img class="w-screen" :src="image.base64" alt="" />
        </div>
      </slide>

      <template #addons>
        <navigation />
        <pagination
          class="bg-transparent absolute bottom-2 left-1/2 -translate-x-1/2"
        />
      </template>
    </Carousel>
  </div>
</template>

<script lang="ts" setup>
import "vue3-carousel/dist/carousel.css";
import { Carousel, Slide, Pagination, Navigation } from "vue3-carousel";

interface PostsResponse {
  id: number;
  title: string;
  images: { id: number; base64: string; isLike: boolean; likeCount: number }[];
  isBookmark: boolean;
  bookmarkCount: number;
  tags: string[];
  date: string;
}

interface LikeResponse {
  isLike: boolean;
  likeCount: number;
}

const route = useRoute();
const { data } = await useFetch<PostsResponse>(
  `http://localhost/api/posts/${route.params.id}`
);
const carousel = ref(null);

const handleLike = async (isLike: boolean) => {
  if (!data.value?.id) return;
  const image = data.value.images[carousel.value?.data.currentSlide.value];
  const { data: likeResponse } = await useFetch<LikeResponse>(
    `http://localhost/api/images/${image.id}/like`,
    {
      body: { isLike },
    }
  );
  data.value.images[carousel.value?.data.currentSlide.value].isLike =
    likeResponse.value?.isLike ?? false;
};
</script>

<style lang="css">
:root {
  --vc-pgn-background-color: #f8f8f8;
  --vc-pgn-active-color: #25968c;
  --vc-clr-primary: #25968c;
}
</style>
