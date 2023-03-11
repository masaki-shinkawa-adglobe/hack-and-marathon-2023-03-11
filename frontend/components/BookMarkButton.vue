<template>
  <div>
    <button @click="handleClick">
            <img src="~/assets/img/bookmark_disable.svg" class="w-6 h-6" v-show="!props.isBookMark">
            <img src="~/assets/img/bookmark_enable.svg" class="w-6 h-6" v-show="props.isBookMark">
        </button>
  </div>
</template>

<script lang="ts" setup>

const props = defineProps<{
    isBookMark: boolean
}>()
const emit = defineEmits(['click']);

const handleClick = () => {
  emit('click', !props.isBookMark);
};
</script>

<style scoped lang="css"></style>
