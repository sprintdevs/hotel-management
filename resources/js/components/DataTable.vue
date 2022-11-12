<script setup lang="ts">
defineProps({
    facilityData: {
        type: Array
    },
    fields: {
        type: Array
    }
})
</script>
<template>
    <table>
        <thead>
            <tr>
                <th v-for="field in fields" :key="field">{{ field }}</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="item in items" :key="item">
                <td v-for="field in fields" :key="field">{{ item[field] }}</td>
            </tr>
        </tbody>
    </table>
</template>
