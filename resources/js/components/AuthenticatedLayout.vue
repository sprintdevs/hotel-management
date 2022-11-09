<script lang="ts" setup>
import Navigation from './Navigation.vue'
</script>

<template>
    <main class="h-screen flex justify-between">
        <Navigation />

        <aside class="flex-1">
            <RouterView />
        </aside>
    </main>
</template>
