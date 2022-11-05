<template>
    <div class="hidden lg:fixed lg:inset-y-0 lg:flex lg:w-64 lg:flex-col">
        <div class="flex flex-grow flex-col overflow-y-auto bg-cyan-700 pt-5 pb-4">
            <RouterLink to="/" class="flex flex-shrink-0 items-center px-4">
                <img class="h-14 w-auto" src="sprintdevs.png" alt="Sprint Devs" />
            </RouterLink>
            <nav class="mt-10 flex flex-1 flex-col divide-y divide-cyan-800 overflow-y-auto" aria-label="Sidebar">
                <div class="space-y-1 px-2">
                    <RouterLink v-for="item in navLinks" :key="item.label" :to="item.to" :class="linkClasses(item.to)">
                        <component :is="item.icon" class="mr-4 h-6 w-6 text-cyan-200" />
                        {{ item.label }}
                    </RouterLink>
                </div>
            </nav>
        </div>
    </div>
</template>

<script setup lang="ts">
import { useRoute } from 'vue-router'

import CreditCard from '../svgs/CreditCard.vue'
import RectangleStack from '../svgs/RectangleStack.vue'
import Swatch from '../svgs/Swatch.vue'
import UserGroup from '../svgs/UserGroup.vue'

const currentRoute = useRoute()

const linkClasses = (routePath: string) => {
    return [routePath === currentRoute.path ? 'bg-cyan-800 text-white' : 'text-cyan-100 hover:text-white hover:bg-cyan-600', 'group flex items-center px-2 py-2 text-base font-medium rounded-md']
}

const navLinks = [
    {
        to: '/facilities',
        label: 'Facilities',
        icon: Swatch
    },
    {
        to: '/rooms',
        label: 'Rooms',
        icon: RectangleStack
    },
    {
        to: '/guests',
        label: 'Guests',
        icon: UserGroup
    },
    {
        to: '/payment',
        label: 'Payments',
        icon: CreditCard
    }
]
</script>
