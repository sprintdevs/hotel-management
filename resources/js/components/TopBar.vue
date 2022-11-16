<script setup lang="ts">
import { ref } from 'vue'
import BuildingOfficeIcon from '../svgs/BuildingOfficeIcon.vue'
import CircleCheckIcon from '../svgs/CircleCheckIcon.vue'
import DropDownIcon from '../svgs/DropDownIcon.vue'
import BellIcon from '../svgs/BellIcon.vue'
import MagnifyingGlass from '../svgs/MagnifyingGlass.vue'

const greetingMessage = ref('')

const currentDate = new Date()

if (currentDate.getHours() < 12) greetingMessage.value = 'Good Morning'
else if (currentDate.getHours() >= 12 && currentDate.getHours() <= 17) greetingMessage.value = 'Good Afternoon'
else if (currentDate.getHours() >= 17 && currentDate.getHours() <= 24) greetingMessage.value = 'Good Evening'
</script>

<template>
    <header class="px-6 bg-white w-full overflow-hidden h-auto border-b-2 shadow-sm border-b-gray-200">
        <div class="overflow-y-auto pt-5 pb-4">
            <div class="mb-6 flex flex-1 flex-col" aria-label="TopBar">
                <div class="flex items-center">
                    <label for="search" class="sr-only">Search</label>
                    <div class="relative w-full">
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3">
                            <MagnifyingGlass class="text-gray-500" />
                        </div>
                        <input type="text" id="search" class="bg-white border-none text-gray-900 focus:ring-transparent text-sm rounded-lg ml-2 w-3/4 pl-10 p-2.5" placeholder="Search" required />
                    </div>
                    <button>
                        <BellIcon class="ml-4 text-gray-500 hover:text-gray-800" />
                    </button>
                    <button id="dropdown-button" data-dropdown-toggle="dropdown" class="flex-shrink-0 inline-flex items-center px-4 text-sm text-center text-gray-900" type="button">
                        <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2.5&w=144&h=144&q=80" class="mr-2 w-8 h-8 rounded-full object-cover" alt="" />
                        <span class="font-semibold">Jane Smith</span>
                        <DropDownIcon class="h-4 text-gray-500 hover:text-gray-800 hover:text-lg" />
                    </button>
                </div>
            </div>
            <hr class="my-5 h-px ml-2 mr-2" />
            <div class="flex">
                <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2.5&w=144&h=144&q=80" class="mt-0 ml-2 w-24 h-24 rounded-full flex-none object-cover" alt="" />

                <div class="flex-grow-1 ml-5 mt-3">
                    <h3 class="font-sans text-3xl">{{ greetingMessage }}, Jane Smith <br /></h3>
                    <div class="flex flex-row mt-3">
                        <BuildingOfficeIcon class="text-gray-500" />
                        <p class="font-medium ml-0.5 text-gray-600">Wall Street</p>
                        <CircleCheckIcon class="text-green-400 ml-4" />
                        <p class="font-medium text-gray-600 ml-0.5">Verified Account</p>
                    </div>
                </div>
            </div>
        </div>
    </header>
</template>
