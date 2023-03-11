<template>
  <div class="h-screen bg-base flex flex-col">
    <Header />
    <div class="m-2 flex-1 pt-10">
      <Comment
        v-if="!pending && data"
        v-for="comment in data.comments"
        :name="comment.name"
        :comment="comment.comment"
        :date="comment.date"
      />
    </div>
    <CommentInput :id="id" @update="refresh" />
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
const { data, pending, refresh } = await useFetch<CommentsResponse>(
  `http://localhost/api/posts/${params.id}/comment`
);

</script>

<style scoped lang="sass"></style>
