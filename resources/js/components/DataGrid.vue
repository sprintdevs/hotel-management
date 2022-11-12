<script setup lang="ts">
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

type Fields = {
    id: number
}

interface Props {
    data: any
    fields: any
}
defineProps<Props>()
</script>

<template>
    <table>
        <thead>
            <tr>
                <th v-for="field in fields" :key="field">{{ field }}</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="item in data.data" :key="item.id">
                <td v-for="field in fields" :key="field">{{ item.attributes.name }}</td>
            </tr>
        </tbody>
    </table>
</template>
