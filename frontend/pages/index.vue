<template>
  <div class="bg-base">
    <Header />
    <div class="grid grid-cols-2 gap-2 mx-2 pt-10">
      <template v-if="!pending">
        <HashTagCard
          v-for="tag in res.tags"
          :key="tag.tag"
          :tag="tag.tag"
          :image="tag.image"
        />
      </template>
    </div>
  </div>
</template>

<script lang="ts" setup>
interface Response {
  tags: {
    tag: string;
    image: string;
  };
}

const { data: res, pending } = useFetch<Response>("http://localhost/api/tags");
</script>

<style scoped lang="sass"></style>
