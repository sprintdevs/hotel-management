<script setup lang="ts"></script>

<template>
    <Navigation />
    <main class="h-screen flex justify-center">
        <div class="flex flex-col space-y-4">
            <ul class="mx-auto flex space-x-4">
                <li><RouterLink to="/">Home</RouterLink></li>
                <li><RouterLink to="/about">About</RouterLink></li>
                <li><RouterLink to="/facilities">Facilities</RouterLink></li>
            </ul>
            <hr />
            <div class="mt-8">
                <RouterView />
            </div>
        </div>
    </main>
</template>
