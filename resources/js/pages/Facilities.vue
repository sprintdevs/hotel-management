<script setup lang="ts">
import GridList from '../components/facilities/GridList.vue'
</script>

<template>
    <div class="flex flex-row justify-between bg-gray-100 items-center mb-6">
        <div class="flex flex-col justify-center">
            <h2 class="font-semibold text-lg">Facility</h2>
            <p class="text-gray-600">A list of all the facilities including their name, title, email and role</p>
        </div>
        <div>
            <RouterLink to="facilities/create">
                <button class="rounded-md border border-transparent bg-cyan-600 py-2 px-4 text-base font-medium text-white shadow-sm hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2">Add Facility</button>
            </RouterLink>
        </div>
    </div>
    <GridList />
</template>
