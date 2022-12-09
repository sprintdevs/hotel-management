<script setup lang="ts">
import { ref } from 'vue'

const isOpen = ref(false)
</script>

<template>
    <div>
        <button @click="isOpen = true">Delete</button>
        <div class="modal" v-if="isOpen">
            <div>
                <h2>Do you want to delete this item?</h2>
                <button @click="isOpen = false">Yes</button>
                <button @click="isOpen = false">Cancel</button>
            </div>
        </div>
    </div>
</template>
