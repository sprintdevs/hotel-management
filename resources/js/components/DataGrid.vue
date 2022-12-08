<script setup lang="ts">
import { onMounted, ref } from 'vue'
import Pagination from './Pagination.vue'

type singleData = {
    type: string
    id: number
    attributes: {
        name: string
        address: string
        phone: string
        email: string
        manager: string
    }
    links: {
        self: string
    }
}
type Data = {
    data: singleData[]
    links: {
        self: string
        first: string
        last: string
        prev: string | null
        next: string
    }
    meta: {
        current_page: number
        from: number
        path: string
        per_page: number
        to: number
    }
}

interface Props {
    data: any
    fields: any
}

const currentPage = ref(1)

const onPageChange = page => {
    currentPage.page = page++
}
defineProps<Props>()
</script>

<template>
    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-white-500 dark:text-gray-400">
            <thead class="text-xs text-white-700 uppercase text-black bg-gray-100 rounded-r-lg border border-gray-300">
                <tr>
                    <th scope="col" class="py-4 px-6" v-for="field in fields" :key="field">{{ field }}</th>
                    <th class="py-4 px-6 w-40 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white border-b bg-white-900 text-black" v-for="item in data" :key="item.id">
                    <td class="py-4 px-6" v-for="field in fields" :key="field">{{ item[field] }}</td>
                    <td class="py-4 px-6 flex space-x-1 justify-center items-center">
                        <button @click="deleteTableRow(index)" class="p-1.5">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-red-800">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
                                />
                            </svg>
                        </button>
                        <button @click="editTableRow(index)" class="p-1.5">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-cyan-800">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"
                                />
                            </svg>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="py-2 pr-3 flex justify-end">
            <Pagination :totalPages="10" :perPage="10" :currentPage="currentPage" @pagechanged="onPageChange" />
        </div>
    </div>
</template>
