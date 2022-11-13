<template>
    <header class="w-full overflow-hidden h-auto">
        <div class="overflow-y-auto bg-gray-300 pt-5 pb-4">
            <div class="mb-6 flex flex-1 flex-col divide-y divide-cyan-800 overflow-y-auto" aria-label="TopBar">
                <div class="flex items-center">
                    <label for="search" class="sr-only">Search</label>
                    <div class="relative w-full">
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 :text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input type="text" id="search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block ml-2 w-full pl-10 p-2.5" placeholder="Search" required />
                    </div>
                    <button id="dropdown-button" data-dropdown-toggle="dropdown" class="flex-shrink-0 inline-flex items-center px-4 text-sm text-center text-gray-900 hover:rounded-full hover:bg-gray-200" type="button">
                        <img src="https://images.unsplash.com/photo-1593085512500-5d55148d6f0d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80" class="mr-2 w-10 rounded-full" alt="" />
                        John Doe
                        <svg aria-hidden="true" class="ml-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <div id="dropdown" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow :bg-gray-700" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top" style="position: absolute">
                        <ul class="py-1 text-sm text-gray-700 :text-gray-200" aria-labelledby="dropdown-button">
                            <li>
                                <button type="button" class="inline-flex py-2 px-4 w-full hover:bg-gray-100 :hover:bg-gray-600 :hover:text-white">1</button>
                            </li>
                            <li>
                                <button type="button" class="inline-flex py-2 px-4 w-full hover:bg-gray-100 :hover:bg-gray-600 :hover:text-white">2</button>
                            </li>
                            <li>
                                <button type="button" class="inline-flex py-2 px-4 w-full hover:bg-gray-100 :hover:bg-gray-600 :hover:text-white">3</button>
                            </li>
                            <li>
                                <button type="button" class="inline-flex py-2 px-4 w-full hover:bg-gray-100 :hover:bg-gray-600 :hover:text-white">4</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <hr class="my-5 h-px ml-2 mr-2" />
            <div class="flex">
                <img src="https://images.unsplash.com/photo-1593085512500-5d55148d6f0d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80" class="ml-2 w-28 rounded-full flex-none" alt="" />

                <div class="flex-grow-1 ml-2 mt-3">
                    <h3 class="font-bold text-lg">Good Morning, John Doe <br /></h3>
                    <div class="flex flex-row mt-5 justify-between">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                        <p class="font-mono">Wall Street</p>
                        <svg class="ml-2 w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"
                            ></path>
                        </svg>
                        <p class="font-sans">Verified Account</p>
                    </div>
                </div>
            </div>
        </div>
    </header>
</template>

<!-- <script setup lang="ts">
import { ref } from 'vue'

const messsage = ref('Good Morning')

const isMorning = () => {
    return new Date().getHours() < 12 ? true : false
}
</script> -->
