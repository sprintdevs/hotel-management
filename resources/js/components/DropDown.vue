<script setup lang="ts">
import { ref } from 'vue'
defineProps({
    value: null,
    options: {
        type: Object,
        required: true
    },
    label: {
        type: String,
        default: ''
    }
})

const selectedOption = null
</script>
<template>
    <label class="block text-sm font-medium text-gray-700">{{ label }}</label>
    <div class="mt-1">
        <select
            v-model="selectedOption"
            @input="
                event => {
                    $emit('input', event.target.value)
                }
            "
            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
        >
            <option v-for="(option, name) in options" :value="option">{{ name }}</option>
        </select>
    </div>
</template>
