<script lang="ts" setup>
import Navigation from './Navigation.vue'
import TopBar from './TopBar.vue'
</script>

<template>
    <main class="h-screen flex justify-between">
        <Navigation />
        <div class="flex flex-col flex-1 bg-gray-100">
            <TopBar />
            <aside class="flex-1">
                <RouterView />
            </aside>
        </div>
    </main>
</template>
