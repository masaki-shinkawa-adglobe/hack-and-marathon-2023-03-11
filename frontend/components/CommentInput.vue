<template>
  <div class="flex">
    <input
      type="text"
      placeholder="コメントを送信"
      v-model="comment"
      class="flex-1 block w-full placeholder-gray-400/70 rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40"
    />
    <button
      class="px-6 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-lg hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80"
      @click="submit"
    >
      送信
    </button>
  </div>
</template>

<script lang="ts" setup>
interface Comment {
  id: number;
}
interface PostsRequestInterface {
  userId: Number;
  comment: string;
}
interface PostsResponseInterface {
  postId: string;
}

interface Emits {
  (e: "update"): void;
}

const props = defineProps<Comment>();
const comment = ref("");
const error = ref("");

const emits = defineEmits<Emits>();

const submit = async () => {
  error.value = "";
  if (comment.value.length <= 0) {
    return (error.value = "タイトルが入力されていません。");
  }

  const body: PostsRequestInterface = {
    userId: 1,
    comment: comment.value,
  };
  if (!props.id) return;
  const data = await $fetch<PostsResponseInterface>(
    `http://localhost:3001/api/posts/${props.id}/comment`,
    {
      method: "POST",
      body,
    }
  );
  emits("update");
};
</script>

<style scoped lang="sass"></style>
