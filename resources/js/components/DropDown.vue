<script setup lang="ts">
import { ref } from 'vue'

const props = defineProps({
    value: null,
    options: {
        type: Object,
        required: true
    },
    label: {
        type: String,
        default: ''
    },
    placeholder: {
        type: String,
        default: ''
    }
})

const emits = defineEmits(['input'])

const selectedOption = ref(null)

const handleInput = (event: Event) => {
    emits('input', (event.target as HTMLInputElement).value)
}
</script>
<template>
    <label class="block text-sm font-medium text-gray-700">{{ label }}</label>
    <div class="mt-1">
        <select v-model="selectedOption" @input="handleInput" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-cyan-500 focus:ring-cyan-500 sm:text-sm">
            <option :value="null" disabled>{{ placeholder }}</option>
            <option v-for="(option, name) in options" :value="option">{{ name }}</option>
        </select>
    </div>
</template>
