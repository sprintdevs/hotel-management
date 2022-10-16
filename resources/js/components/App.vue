<script setup lang="ts">
import { ref } from 'vue'

let title = ref('World')
</script>

<template>
    <div class="text-3xl text-red-500">Hello {{ title }}!</div>
</template>
