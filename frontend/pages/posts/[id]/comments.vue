<template>
  <div class="h-screen bg-base flex flex-col">
    <Header />
    <div class="m-2 flex-1">
      <Comment
        v-if="!pending && data"
        v-for="comment in data.comments"
        :name="comment.name"
        :comment="comment.comment"
        :date="comment.updated_at"
      />
    </div>
    <CommentInput :id="id" />
  </div>
</template>

<script lang="ts" setup>
interface CommentsResponse {
  comments: [
    {
      comment: string;
      name: string;
      updated_at: string;
    }
  ];
}

const { params } = useRoute();
const id = Number(params.id);
const { data, pending } = await useFetch<CommentsResponse>(
  `http://localhost/api/posts/${params.id}/comment`
);
</script>

<style scoped lang="sass"></style>
