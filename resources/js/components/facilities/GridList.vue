<script setup lang="ts">
import DataGrid from '../DataGrid.vue'

const facilityData = [
    {
        name: 'Radisson',
        address: 'Street, City, State - ZIP',
        phone: '+8801837465987',
        email: 'radisson@email.com',
        manager: 'John Doe'
    },
    {
        name: 'West-Inn',
        address: 'Street, City, State - ZIP',
        phone: '+88018374112233',
        email: 'radisson@email.com',
        manager: 'Will Jackson'
    },
    {
        name: 'Sheraton',
        address: 'Street, City, State - ZIP',
        phone: '+880183223344',
        email: 'radisson@email.com',
        manager: 'Michaed Smith'
    }
]
const fields = ['name', 'address', 'phone', 'email', 'manager']
</script>

<template>
    <DataGrid :fields="fields" :data="facilityData" />
</template>
