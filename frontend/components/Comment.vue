<template>
  <div>
    <div class="flex justify-between text-main">
      <span class="whitespace-nowrap overflow-hidden text-ellipsis flex-1 font-bold">{{
        name
      }}</span>
      <span>{{ date }}</span>
    </div>
    <p class="border-b-2 text-main pb-2">{{ comment }}</p>
  </div>
</template>

<script lang="ts" setup>
import { format } from "date-fns";
interface Comment {
  comment: string;
  name: string;
  date: string;
}

const props = defineProps<Comment>();

const date = computed(() => {
  return format(new Date(props.date), "yyyy/MM/dd HH:mm:ss");
});
</script>

<style scoped lang="sass"></style>
