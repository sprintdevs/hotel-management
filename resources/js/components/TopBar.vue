<script setup lang="ts">
import { ref } from 'vue'

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
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input type="text" id="search" class="bg-white border-transparent text-gray-900 text-sm rounded-lg ml-2 w-full pl-10 p-2.5" placeholder="Search" required />
                    </div>
                    <button>
                        <svg class="w-6 h-6 ml-5" fill="none" stroke="gray" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                        </svg>
                    </button>
                    <button id="dropdown-button" data-dropdown-toggle="dropdown" class="flex-shrink-0 inline-flex items-center px-4 text-sm text-center text-gray-900 hover:rounded-full" type="button">
                        <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2.5&w=144&h=144&q=80" class="mr-2 w-8 h-8 rounded-full object-cover" alt="" />
                        <span class="font-semibold">Jane Smith</span>
                        <svg aria-hidden="true" class="ml-1 w-4 h-4" fill="gray" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <div id="dropdown" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top" style="position: absolute">
                        <ul class="py-1 text-sm text-gray-700" aria-labelledby="dropdown-button">
                            <li>
                                <button type="button" class="inline-flex py-2 px-4 w-full hover:bg-gray-100">1</button>
                            </li>
                            <li>
                                <button type="button" class="inline-flex py-2 px-4 w-full hover:bg-gray-100">2</button>
                            </li>
                            <li>
                                <button type="button" class="inline-flex py-2 px-4 w-full hover:bg-gray-100">3</button>
                            </li>
                            <li>
                                <button type="button" class="inline-flex py-2 px-4 w-full hover:bg-gray-100">4</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <hr class="my-5 h-px ml-2 mr-2" />
            <div class="flex">
                <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2.5&w=144&h=144&q=80" class="mt-0 ml-2 w-24 h-24 rounded-full flex-none object-cover" alt="" />

                <div class="flex-grow-1 ml-5 mt-3">
                    <h3 class="font-sans text-3xl">{{ greetingMessage }}, Jane Smith <br /></h3>
                    <div class="flex flex-row mt-3">
                        <svg class="w-6 h-6" fill="none" stroke="gray" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                        <p class="font-medium ml-1 text-gray-600">Wall Street</p>
                        <svg class="w-6 h-6 ml-5 opacity-50" fill="green" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>

                        <p class="font-medium text-gray-600 ml-1">Verified Account</p>
                    </div>
                </div>
            </div>
        </div>
    </header>
</template>
