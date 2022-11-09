<template>
    <nav class="hidden lg:h-screen lg:flex lg:w-64 lg:flex-col">
        <div class="flex flex-grow flex-col overflow-y-auto bg-cyan-700 pt-5 pb-4">
            <RouterLink to="/" class="flex flex-shrink-0 items-center px-4">
                <img class="h-14 w-auto" src="../../../public/sprintdevs.png" alt="Sprint Devs" />
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
    </nav>
</template>

<script setup lang="ts">
import { useRoute } from 'vue-router'

import HomeModernIcon from '../svgs/HomeModernIcon.vue'
import SwatchIcon from '../svgs/SwatchIcon.vue'
import SquareStackIcon from '../svgs/SquareStackIcon.vue'
import RectangleStackIcon from '../svgs/RectangleStackIcon.vue'
import UserGroupIcon from '../svgs/UserGroupIcon.vue'
import CreditCardIcon from '../svgs/CreditCardIcon.vue'

const currentRoute = useRoute()

const linkClasses = (routePath: string) => {
    const baseUrl = currentRoute.path.split('/')[1]

    return [routePath.slice(1) === baseUrl ? 'bg-cyan-800 text-white' : 'text-cyan-100 hover:text-white hover:bg-cyan-600', 'group flex items-center px-2 py-2 text-base font-medium rounded-md']
}

const navLinks = [
    {
        to: '/dashboard',
        label: 'Dashboard',
        icon: HomeModernIcon
    },
    {
        to: '/facilities',
        label: 'Facilities',
        icon: SwatchIcon
    },
    {
        to: '/floors',
        label: 'Floors',
        icon: SquareStackIcon
    },
    {
        to: '/rooms',
        label: 'Rooms',
        icon: RectangleStackIcon
    },
    {
        to: '/guests',
        label: 'Guests',
        icon: UserGroupIcon
    },
    {
        to: '/payment',
        label: 'Payments',
        icon: CreditCardIcon
    }
]
</script>
