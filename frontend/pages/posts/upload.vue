<template>
  <div>
    <Header />
    <div
      v-if="images.length === 0"
      class="aspect-square flex justify-center items-center bg-main pt-10"
    >
      <img class="w-1/3 bg-main" src="~/assets/img/image.svg" alt="" />
    </div>
    <Carousel
      v-else
      ref="carousel"
      :items-to-show="1"
      class="bg-main h-[100vw]"
    >
      <slide v-for="image in images" :key="image">
        <div class="aspect-square w-screen flex items-center bg-main">
          <img class="w-screen h-full object-contain" :src="image" alt="" />
        </div>
      </slide>

      <template #addons>
        <navigation />
        <pagination
          class="bg-transparent absolute bottom-2 left-1/2 -translate-x-1/2"
        />
      </template>
    </Carousel>
    <div class="m-2">
      <label
        class="inline-block text-center px-6 py-2 w-full relative font-medium tracking-wide border-accent border-2 text-main capitalize transition-colors duration-300 transform bg-base rounded-lg hover:bg-base focus:outline-none focus:ring focus:ring-accent focus:ring-opacity-80"
      >
        <input
          class="absolute left-0 top-0 opacity-0 w-full h-full"
          type="file"
          accept=".jpg, .jpeg, .png"
          multiple
          @change="handleFileUpload"
        />
        画像選択
      </label>

      <div class="mt-2">
        <label for="title" class="block text-sm text-main">
          タイトル
          <input
            v-model="title"
            type="text"
            placeholder="タイトル"
            class="block mt-2 w-full placeholder-gray-400/70 rounded-lg border border-accent bg-base px-5 py-2.5 text-main focus:outline-none focus:ring focus:ring-opacity-40"
          />
        </label>
      </div>

      <div class="mt-2">
        <label for="detail" class="block text-sm text-main">
          詳細
          <textarea
            v-model="detail"
            placeholder="#xxxx でハッシュタグの登録ができます"
            class="block mt-2 w-full placeholder-gray-400/70 rounded-lg border border-accent bg-base px-5 py-2.5 text-main focus:outline-none focus:ring focus:ring-opacity-40"
          />
        </label>
      </div>

      <div class="mt-2">
        <button
          class="inline-block text-center px-6 py-2 w-full relative font-medium tracking-wide border-accent border-2 text-base capitalize transition-colors duration-300 transform bg-accent rounded-lg hover:bg-accent focus:outline-none focus:ring focus:ring-accent focus:ring-opacity-80"
          @click="upload"
        >
          アップロード
        </button>
        <p class="text-red-600">{{ error }}</p>
      </div>
    </div>
  </div>
</template>

<script lang="ts" setup>
import "vue3-carousel/dist/carousel.css";
import { Carousel, Slide, Pagination, Navigation } from "vue3-carousel";

interface PostsRequestInterface {
  title: string;
  detail: string;
  images: string[];
}

interface PostsResponseInterface {
  id: string;
}

const images = ref<string[]>([]);
const title = ref("");
const detail = ref("");
const error = ref("");

const handleFileUpload = async (event: Event) => {
  if (!event.target) return;
  if (!(event.target instanceof HTMLInputElement)) return;
  if (!event.target.files) return;

  const readerPromise: Promise<string>[] = [];
  for (let index = 0; index < event.target.files.length; index++) {
    const file = event.target.files[index];
    readerPromise.push(
      new Promise<string>((resolve, reject) => {
        const reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = () => {
          if (reader.result === null || reader.result instanceof ArrayBuffer) {
            console.log("failed: reader.result");
            return reject();
          }
          resolve(reader.result);
        };
      })
    );
  }
  images.value = await Promise.all<string>(readerPromise);
};

const upload = async () => {
  error.value = "";
  if (images.value.length <= 0) {
    return (error.value = "画像が選択されていません。");
  }
  if (title.value.length <= 0) {
    return (error.value = "タイトルが入力されていません。");
  }
  if (title.value.length > 255) {
    return (error.value = "タイトルは255文字以下にしてください。");
  }
  if (detail.value.length <= 0) {
    return (error.value = "詳細が入力されていません。");
  }
  const body: PostsRequestInterface = {
    title: title.value,
    detail: detail.value,
    images: images.value,
  };
  const data = await $fetch<PostsResponseInterface>("http://localhost/api/posts", {
    method: "POST",
    body,
  });
  const router = useRouter();
  router.push(`/posts/${data.id}`);
};
</script>

<style lang="css">
:root {
  --vc-pgn-background-color: #f8f8f8;
  --vc-pgn-active-color: #25968c;
  --vc-clr-primary: #25968c;
}
</style>
