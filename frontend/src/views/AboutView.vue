<template>
  <div class="about">
    <h1>{{hello}}</h1>
  </div>
</template>
<script setup>
import { defineComponent, ref } from 'vue'

  const hello = ref('HELLO')

</script>
