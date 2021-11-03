<script setup>
  import ky from 'ky'
  import { ref } from 'vue';

  const posts = ref([]);
  async function retrievePosts() {
    posts.value = await ky.get('http://localhost:8000/api/posts').json();
  }
</script>

<template>
  <button type="button" @click="retrievePosts">Load posts</button>
  <div v-for="post in posts">
    <h2>{{ post.title }}</h2>
    <div>{{ post.content }}</div>
    <time>{{ post.createdAt }}</time>
    <time>{{ post.updatedAt }}</time>
  </div>
</template>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
