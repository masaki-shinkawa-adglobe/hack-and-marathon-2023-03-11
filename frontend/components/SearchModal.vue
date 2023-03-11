<template>
  <teleport to="body">
    <div v-show="props.isModalOpen" class="fixed inset-0 z-10 overflow-y-auto">
      <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div class="relative inline-block px-4 pt-5 pb-4 overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl rtl:text-right dark:bg-gray-900 sm:my-8 sm:align-middle sm:max-w-sm sm:w-full sm:p-6">
          <div>
            <div class="mt-2 text-center">
              <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                  コンテンツ
              </p>
            </div>
          </div>
          <div class="mt-5 sm:flex sm:items-center sm:justify-between">
            <div class="sm:flex sm:items-center ">
              <button @click="handleClickClose" class="w-full px-4 py-2 mt-2 text-sm font-medium tracking-wide text-gray-700 capitalize transition-colors duration-300 transform border border-gray-200 rounded-md sm:mt-0 sm:w-auto sm:mx-2 dark:text-gray-200 dark:border-gray-700 dark:hover:bg-gray-800 hover:bg-gray-100 focus:outline-none focus:ring focus:ring-gray-300 focus:ring-opacity-40">
                閉じる
              </button>
              <button @click="handleClickSubmit" class="w-full px-4 py-2 mt-2 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-md sm:w-auto sm:mt-0 hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40">
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
};
const props = defineProps<Props>();
const emit = defineEmits(['handleClose', 'handleSubmit']);
const handleClickClose = () => {
  emit('handleClose');
};
const handleClickSubmit = () => {
  emit('handleSubmit');
};
</script>

<style scoped></style>
