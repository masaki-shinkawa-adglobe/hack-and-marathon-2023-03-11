<template>
  <teleport to="body">
    <div v-show="props.isModalOpen" class="fixed inset-0 z-10 overflow-y-auto">
      <div class="w-full h-full fixed bg-black opacity-25"></div>
      <div
        class="flex items-center justify-center min-h-screen px-4 py-8 pb-20 text-center sm:block sm:p-0 w-full"
      >
        <span
          class="hidden sm:inline-block sm:align-middle sm:h-screen"
          aria-hidden="true"
          >&#8203;</span
        >
        <div
          class="w-full relative flex flex-col px-4 pt-5 pb-4 overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl rtl:text-right sm:my-8 sm:align-middle sm:max-w-sm sm:w-full sm:p-6 max-h-[80vh]"
        >
          <div class="flex gap-2">
            <input
              v-model="input"
              type="text"
              placeholder="検索"
              class="block w-full placeholder-gray-400/70 rounded-lg border border-accent bg-white px-5 py-2.5 text-gray-700 focus:border-accent focus:outline-none focus:ring focus:ring-accent focus:ring-opacity-40"
            />
            <button
              class="flex items-center px-2 py-2 font-medium tracking-wide text-base border border-accent capitalize transition-colors duration-300 transform bg-accent rounded-lg hover:bg-accept focus:outline-none focus:ring focus:ring-accept focus:ring-opacity-80"
              @click="() => handleAddInput()"
            >
              <img class="w-8 h-8" src="~/assets/img/plus.svg" />
            </button>
          </div>
          <div class="flex-1 overflow-y-scroll">
            <div class="mt-2">
              <div class="flex gap-2 flex-wrap">
                <button
                  v-for="tag in tags"
                  class="flex items-center px-4 py-2 font-medium tracking-wide text-main border border-accent capitalize transition-colors duration-300 transform bg-base rounded-lg hover:bg-base focus:outline-none focus:ring focus:ring-base focus:ring-opacity-80 max-w-full"
                  @click="() => handleClickDeleteTag(tag)"
                >
                  <span
                    class="mx-1 max-w-[95%] overflow-hidden text-ellipsis whitespace-nowrap"
                    >#{{ tag }}</span
                  >
                  <img class="w-5 h-5 mx-1" src="~/assets/img/cross.svg" />
                </button>
              </div>
              <div class="flex my-2 items-center">
                <img class="w-5 h-5" src="~/assets/img/tag.svg" alt="" />
                <p>人気ハッシュタグ</p>
              </div>
              <div class="flex gap-2 flex-wrap">
                <button
                  v-for="tag in popularTags"
                  class="flex items-center px-4 py-2 font-medium tracking-wide text-main border border-accent capitalize transition-colors duration-300 transform bg-base rounded-lg hover:bg-base focus:outline-none focus:ring focus:ring-base focus:ring-opacity-80 max-w-full"
                  @click="() => handleClickAddTag(tag)"
                >
                  <span class="mx-1 max-w-[95%] overflow-hidden text-ellipsis whitespace-nowrap">#{{ tag }}</span>
                </button>
              </div>
            </div>
          </div>
          <div class="mt-5 sm:flex sm:items-center sm:justify-between">
            <div class="sm:flex sm:items-center flex gap-2">
              <button
                @click="handleClickClose"
                class="w-full px-4 py-2 mt-2 text-sm font-medium tracking-wide text-main capitalize transition-colors duration-300 transform border border-accent rounded-md sm:mt-0 sm:w-auto sm:mx-2 hover:bg-accent focus:outline-none focus:ring focus:ring-accent focus:ring-opacity-40"
              >
                閉じる
              </button>
              <button
                @click="handleClickSubmit"
                class="w-full px-4 py-2 mt-2 text-sm font-medium tracking-wide text-base capitalize transition-colors duration-300 transform bg-accent rounded-md sm:w-auto sm:mt-0 hover:bg-accent focus:outline-none focus:ring focus:ring-accent focus:ring-opacity-40"
              >
                検索
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </teleport>
</template>

<script lang="ts" setup>
interface Props {
  isModalOpen: boolean;
  tags: string[];
  popularTags: string[];
}
const props = defineProps<Props>();
const emit = defineEmits([
  "handleClose",
  "handleSubmit",
  "handleAddTags",
  "handleDeleteTags",
]);

const input = ref("");
const handleClickClose = () => {
  emit("handleClose");
};
const handleClickSubmit = () => {
  emit("handleSubmit");
};
const handleClickAddTag = (tag: string) => {
  if (props.tags.some((_tag) => _tag === tag)) {
    return;
  }
  emit("handleAddTags", tag);
};
const handleClickDeleteTag = (tag: string) => {
  emit("handleDeleteTags", tag);
};
const handleAddInput = () => {
  if (input.value === "") return;
  handleClickAddTag(input.value);
  input.value = "";
};
</script>

<style scoped></style>
