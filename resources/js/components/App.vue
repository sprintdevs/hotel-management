<script setup lang="ts">
import { ref } from 'vue'

let title = ref('World')
</script>

<template>
    <main class="h-screen flex justify-center">
        <div class="flex flex-col">
            <ul class="mx-auto flex space-x-4">
                <li><RouterLink to="/">Home</RouterLink></li>
                <li><RouterLink to="/about">About</RouterLink></li>
            </ul>
            <hr />
            <div class="mt-8">
                <RouterView />
            </div>
        </div>
    </main>
</template>
