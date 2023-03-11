<template>
  <div class="bg-base">
    <Header />
    <main>
      <div v-for="post in res?.posts" :key="post.id">
        <PostListItem
          :id="post.id"
          :title="post.title"
          :detail="post.detail"
          :image="post.image"
          :isBookmark="post.isBookmark"
          :date="post.date"
        />
      </div>
    </main>
  </div>
</template>

<script lang="ts" setup>
import { LocationQueryValue } from "vue-router";

interface PostsResponseInterface {
  posts: {
    id: number;
    title: string;
    detail: string;
    image: string;
    isBookmark: boolean;
    date: string;
  }[];
}

const route = useRoute();

const query = computed(() => {
  const query: any = {};
  query.title = route.query.title?.[0]?.toString() || undefined;
  query.isBookmark = route.query.isBookmark?.[0]?.toString() || undefined;
  if (!route.query.tags?.length || !route.query.tags[0]?.toString()) return [];
  for (let index = 0; index < route.query.tags.length; index++) {
    const tag = route.query.tags[index];
    if (tag) {
      query[`tag[${index}]`] = tag?.toString();
    }
  }
  return query;
});

const { data: res, pending } = useFetch<PostsResponseInterface>("http://localhost/api/posts", {
  query: query.value,
});
</script>

<style scoped lang="sass"></style>
