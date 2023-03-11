<template>
  <div class="h-screen bg-base">
    <Header />
    <div class="m-2">
      <Comment
        v-if="data"
        v-for="comment in data.comments"
        :name="comment.name"
        :comment="comment.comment"
        :date="comment.date"
      />
    </div>
  </div>
</template>

<script lang="ts" setup>
interface CommentsResponse {
  comments: [
    {
      comment: string;
      name: string;
      date: string;
    }
  ];
}

const { params } = useRoute();
const { data } = await useFetch<CommentsResponse>(
  `http://localhost/api/posts/${params.id}/comment`
);
</script>

<style scoped lang="sass"></style>
