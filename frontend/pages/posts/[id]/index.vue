<template>
  <div>
    <Carousel ref="carousel" :items-to-show="1" class="bg-main">
      <slide v-for="image in data.images" :key="image.base64">
        <div class="h-screen w-screen flex items-center bg-main">
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

interface Response {
  id: number;
  title: string;
  images: { base64: string; isLike: boolean; likeCount: number }[];
  isBookmark: boolean;
  bookmarkCount: number;
  tags: string[];
  date: string;
}

const data = ref<Response>({
  id: 1,
  title: "hogehoge",
  images: [
    {
      base64: "https://placehold.jp/150x150.png",
      isLike: false,
      likeCount: 10,
    },
    {
      base64: "https://placehold.jp/150x150.png",
      isLike: false,
      likeCount: 10,
    },
    {
      base64: "https://placehold.jp/150x150.png",
      isLike: false,
      likeCount: 10,
    },
  ],
  isBookmark: false,
  bookmarkCount: 0,
  tags: ["aaa", "bbb"],
  date: "2022-01-01T01:01:01",
});

const carousel = ref(null);

const handleLike = (status: boolean) => {
  data.value.images[carousel.value?.data.currentSlide.value].isLike = status;
};
</script>

<style lang="css">
:root {
  --vc-pgn-background-color: #f8f8f8;
  --vc-pgn-active-color: #25968c;
  --vc-clr-primary: #25968c;
}
</style>
