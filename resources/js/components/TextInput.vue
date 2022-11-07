<script setup lang="ts">
defineProps({
    label: {
        type: String,
        default: ''
    },
    modelValue: {
        type: [String, Number],
        default: ''
    }
})
</script>
<template>
    <label class="block text-sm font-medium text-gray-700">{{ label }}</label>
    <div class="mt-1">
        <input v-bind="$attrs" id="name" name="name" :placeholder="label" :value="modelValue" @input="$emit('update:modelValue, $event.target.value')" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
    </div>
</template>
