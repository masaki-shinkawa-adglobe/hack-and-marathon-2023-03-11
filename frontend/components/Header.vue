<template>
  <nav x-data="{ isOpen: false }" class="fixed bg-base shadow w-full z-50">
    <div class="container px-6 mx-auto">
      <div class="lg:flex lg:items-center lg:justify-between">
        <div class="flex items-center justify-between">
          <NuxtLink href="/">
            <img class="w-auto h-6 sm:h-7" src="~/assets/img/logo.png" alt="" />
          </NuxtLink>

          <!-- Mobile menu button -->
          <div class="flex lg:hidden">
            <SearchButton @handle-click="handleModalOpen" class="m-2" />
            <button
              x-cloak
              @click="isOpen = !isOpen"
              type="button"
              class="text-gray-500 hover:text-main focus:outline-none focus:text-main dark:focus:text-main"
              aria-label="toggle menu"
            >
              <svg
                v-show="!isOpen"
                xmlns="http://www.w3.org/2000/svg"
                class="w-6 h-6"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M4 8h16M4 16h16"
                />
              </svg>

              <svg
                v-show="isOpen"
                xmlns="http://www.w3.org/2000/svg"
                class="w-6 h-6"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M6 18L18 6M6 6l12 12"
                />
              </svg>
            </button>
          </div>
        </div>

        <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
        <div
          x-cloak
          :class="[
            isOpen
              ? 'translate-x-0 opacity-100 '
              : 'opacity-0 -translate-x-full',
          ]"
          class="absolute inset-x-0 z-20 w-full px-6 py-4 transition-all duration-300 ease-in-out bg-base lg:mt-0 lg:p-0 lg:top-0 lg:relative lg:bg-transparent lg:w-auto lg:opacity-100 lg:translate-x-0 lg:flex lg:items-center"
        >
          <div class="flex flex-col -mx-6 lg:flex-row lg:items-center lg:mx-8">
            <NuxtLink
              href="/"
              class="px-3 py-2 mx-3 mt-2 text-main transition-colors duration-300 transform rounded-md lg:mt-0 hover:bg-base"
              >??????????????????????????????</NuxtLink
            >
            <NuxtLink
              href="/posts/upload"
              class="px-3 py-2 mx-3 mt-2 text-main transition-colors duration-300 transform rounded-md lg:mt-0 hover:bg-base"
              >??????????????????</NuxtLink
            >
          </div>

          <div class="flex items-center mt-4 lg:mt-0">
            <button
              class="hidden mx-4 text-main transition-colors duration-300 transform lg:block hover:text-main focus:text-main focus:outline-none"
              aria-label="show notifications"
            >
              <svg
                class="w-6 h-6"
                viewBox="0 0 24 24"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M15 17H20L18.5951 15.5951C18.2141 15.2141 18 14.6973 18 14.1585V11C18 8.38757 16.3304 6.16509 14 5.34142V5C14 3.89543 13.1046 3 12 3C10.8954 3 10 3.89543 10 5V5.34142C7.66962 6.16509 6 8.38757 6 11V14.1585C6 14.6973 5.78595 15.2141 5.40493 15.5951L4 17H9M15 17V18C15 19.6569 13.6569 21 12 21C10.3431 21 9 19.6569 9 18V17M15 17H9"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
              </svg>
            </button>
          </div>
        </div>
      </div>
    </div>
    <SearchModal
      :is-modal-open="isModalOpen"
      :tags="tags"
      :popular-tags="popularTags"
      @handle-close="handleModalClose"
      @handle-submit="handleModalSubmit"
      @handle-add-tags="handleAddTags"
      @handle-delete-tags="handleDeleteTags"
    />
  </nav>
</template>

<script lang="ts" setup>
interface Tag {
  tag: string;
  image: string;
}
interface Response {
  tags: Tag[];
}

const isOpen = ref(false);
const isModalOpen = ref(false);

const tags = ref<string[]>([]);
const { data } = await useFetch<Response>("http://localhost/api/tags");

const popularTags = computed(() => {
  if (!data.value) return [];
  return data.value.tags.reduce<Tag[]>((_tags, _tag) => {
    if (_tags.some((tagsTag) => tagsTag.tag === _tag.tag)) {
      return _tags;
    }
    return [..._tags, _tag];
  }, []).map(tag => tag.tag);
});

const handleModalOpen = () => {
  isModalOpen.value = !isModalOpen.value;
};
const handleModalClose = () => {
  isModalOpen.value = false;
};
const handleModalSubmit = () => {
  console.log("submit");
  const query = tags.value
    .map((tag) => {
      return `tags=${tag}`;
    })
    .join("&");
  location.href = `http://localhost:3000/posts?${query}`;
};
const handleAddTags = (tag: string) => {
  tags.value = [...tags.value, tag];
};
const handleDeleteTags = (tag: string) => {
  tags.value = tags.value.filter((_tag) => tag !== _tag);
};
</script>

<style scoped lang="sass"></style>
