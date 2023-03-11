<template>
  <div class="bg-base">
    <Header />
    <div class="grid grid-cols-2 gap-2 mx-2 pt-10">
      <template v-if="!pending">
        <HashTagCard
          v-for="tag in tags"
          :key="tag.tag"
          :tag="tag.tag"
          :image="tag.image"
        />
      </template>
    </div>
  </div>
</template>

<script lang="ts" setup>
interface Tag {
  tag: string;
  image: string;
}
interface Response {
  tags: Tag[];
}

const { data: res, pending } = await useFetch<Response>(
  "http://localhost/api/tags"
);

const tags = computed(() => {
  if (!res.value) return [];
  return res.value.tags.reduce<Tag[]>((_tags, _tag) => {
    if (_tags.some((tagsTag) => tagsTag.tag === _tag.tag)) {
      return _tags;
    }
    return [..._tags, _tag];
  }, []);
});
</script>

<style scoped lang="sass"></style>
