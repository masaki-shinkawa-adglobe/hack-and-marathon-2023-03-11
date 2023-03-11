<template>
  <div>
    <button @click="handleClick">
			<img src="~/assets/img/favorite_disable.svg" class="w-6 h-6" v-show="!props.isLike">
			<img src="~/assets/img/favorite_enable.svg" class="w-6 h-6" v-show="props.isLike">
		</button>
  </div>
</template>

<script lang="ts" setup>

const props = defineProps<{
	isLike: boolean
}>()
const emit = defineEmits(['click']);

const handleClick = () => {
  emit('click', !props.isLike);
};
</script>

<style scoped lang="css"></style>
