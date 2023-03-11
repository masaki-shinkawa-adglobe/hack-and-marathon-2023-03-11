<template>
  <div class="bg-base">
    <Header />
    <main>
      <div v-for="post in res.posts" :key="post.id">
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
// TODO: API
const res = ref({
  posts: [
    {
      id: 0,
      title: "タイトル１",
      detail: "詳細詳細詳細詳細詳細詳細詳細詳細詳細詳細詳細詳細詳細詳細詳細詳細詳細詳細詳細詳細詳細詳細詳細詳細詳細詳細詳細詳細詳細詳細詳細詳細詳細詳細詳細詳細詳細詳細詳細詳細詳細詳細詳細...",
      image: "https://placehold.jp/150x150.png",
      isBookmark: false,
      date: "2023-03-11-T00:00:00"
    },
    {
      id: 1,
      title: "タイトル２",
      detail: "詳細詳細詳細詳細詳細詳細詳細詳細詳細詳細詳細詳細詳細詳細詳細詳細詳細詳細詳細詳細詳細詳細詳細詳細詳細詳細詳細詳細詳細詳細詳細詳細詳細詳細詳細詳細詳細詳細詳細詳細詳細詳細詳細...",
      image: "https://placehold.jp/150x150.png",
      isBookmark: false,
      date: "2023-03-11-T00:00:00"
    },
    {
      id: 2,
      title: "タイトル２",
      detail: "詳細詳細詳細詳細詳細詳細詳細詳細",
      image: "https://placehold.jp/150x150.png",
      isBookmark: false,
      date: "2023-03-11-T00:00:00"
    },
  ]
});
</script>

<style scoped lang="sass"></style>
