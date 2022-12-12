<script setup lang="ts">
import { ref } from 'vue'

import ExclamationCircle from '../../svgs/ExclamationCircle.vue'

const isOpen = ref(false)
</script>

<template>
    <div>
        <button @click="isOpen = true" class="rounded-sm border border-transparent bg-cyan-600 py-2 px-2 text-xs font-normal text-white shadow-sm hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2">Delete</button>
        <div class="modal" v-if="isOpen">
            <div class="absolute inset-0 max-h-screen bg-gray-700 bg-opacity-90">
                <div class="relative top-1/3 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
                    <div class="p-6 text-center">
                        <div class="flex flex-1 justify-center">
                            <ExclamationCircle class="text-red-600 h-1/4 w-12 rounded-full bg-red-400 bg-opacity-30 p-2" />
                        </div>
                        <h3 class="mb-5 mt-2 text-base font-semibold">Are you sure you want to delete this?</h3>
                        <button @click="isOpen = false" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">Yes</button>
                        <button @click="isOpen = false" type="button" class="text-black bg-gray-200 hover:bg-gray-400 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">No</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
