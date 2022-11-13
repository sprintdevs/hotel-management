<script setup lang="ts">
import { onMounted, ref } from 'vue'
import { defaults } from 'lodash'
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
    currentPage.page = page
}
defineProps<Props>()
</script>

<template>
    <div>
        <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-white-500 dark:text-gray-400">
                <thead class="text-xs text-white-700 uppercase text-white bg-cyan-700 rounded-r-lg border border-gray-300">
                    <tr>
                        <th scope="col" class="py-3 px-6" v-for="field in fields" :key="field">{{ field }}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b bg-white-900 text-black" v-for="item in data" :key="item.id">
                        <td class="py-4 px-6" v-for="field in fields" :key="field">{{ item[field] }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div>
            <Pagination :totalPages="10" :perPage="10" :currentPage="currentPage" @pagechanged="onPageChange" />
        </div>
    </div>
</template>
