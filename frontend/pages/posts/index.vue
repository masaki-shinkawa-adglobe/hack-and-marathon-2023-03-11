<template>
  <div class="bg-base">
    <Header />
    <main class="pt-10 h-screen">
      <div v-for="post in res?.posts" :key="post.id">
        <PostListItem
          :id="post.id"
          :title="post.title"
          :detail="post.detail"
          :image="post.image"
          :isBookmark="post.isBookmark"
          :date="post.date"
          @update="refresh"
        />
      </div>
    </main>
  </div>
</template>

<script lang="ts" setup>
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
  query.title = route.query.title?.toString() || undefined;
  query.isBookmark = route.query.isBookmark?.toString() || undefined;
  if (!route.query.tags?.length || !route.query.tags[0]?.toString())
    return query;
  if (!Array.isArray(route.query.tags)) {
    query["tags[]"] = route.query.tags;
    return query;
  }
  for (let index = 0; index < route.query.tags.length; index++) {
    const tag = route.query.tags[index];
    if (tag) {
      query[`tag[${index}]`] = tag?.toString();
    }
  }
  return query;
});

const {
  data: res,
  pending,
  refresh,
} = useFetch<PostsResponseInterface>("http://localhost/api/posts", {
  query,
});
</script>

<style scoped lang="sass"></style>
