<script setup lang="ts">
import { ref } from 'vue'

import ExclamationCircle from '../../svgs/ExclamationCircle.vue'

const isOpen = ref(false)
</script>

<template>
    <div>
        <button @click="isOpen = true" class="rounded-sm border border-transparent bg-cyan-600 py-2 px-2 text-xs font-normal text-white shadow-sm hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2">Delete</button>
        <div class="modal" v-if="isOpen">
            <div class="absolute inset-0 max-h-screen bg-gray-700 bg-opacity-25">
                <div class="relative top-1/3 mx-auto p-1 border w-4/12 shadow-lg rounded-md bg-white">
                    <div class="p-6">
                        <div class="flex flex-row gap-3">
                            <ExclamationCircle class="text-red-600 h-2/5 w-14 rounded-full bg-red-400 bg-opacity-30 p-2" />
                            <div class="">
                                <h3 class="text-lg font-semibold">Delete Item</h3>
                                <p class="text-gray-500 font-medium">Are you sure you want to delete this item? It will be deleted permanently and the action can not be undone</p>
                            </div>
                        </div>
                        <div class="flex justify-end pt-2">
                            <button @click="isOpen = false" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">Yes</button>
                            <button @click="isOpen = false" type="button" class="text-black bg-gray-200 hover:bg-gray-400 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
