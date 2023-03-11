<template>
  <div class="bg-base">
    <Header />
    <div class="grid grid-cols-2 gap-2 m-2">
      <HashTagCard
        v-for="tag in res.tags"
        :key="tag.tag"
        :tag="tag.tag"
        :image="tag.image"
      />
    </div>
  </div>
</template>

<script lang="ts" setup>
// TODO: API
const res = ref({
  tags: [
    { tag: "aaa", image: "https://placehold.jp/150x150.png" },
    { tag: "bbb", image: "https://placehold.jp/150x150.png" },
    { tag: "ccc", image: "https://placehold.jp/150x150.png" },
    { tag: "ddd", image: "https://placehold.jp/150x150.png" },
  ],
});
</script>

<style scoped lang="sass"></style>
