<script lang="ts">
import DataTable from '../DataTable.vue'

export default {
    setup() {
        const facilityData = [
            {
                facility_id: 1,
                facility_name: 'Radisson',
                address: 'Street, City, State - ZIP',
                phone: '+8801837465987',
                email: 'radisson@email.com',
                manager_name: 'John Doe',
                manager_id: 1
            },
            {
                facility_id: 2,
                facility_name: 'West-Inn',
                address: 'Street, City, State - ZIP',
                phone: '+88018374112233',
                email: 'radisson@email.com',
                manager_name: 'Will Jackson',
                manager_id: 1
            },
            {
                facility_id: 1,
                facility_name: 'Sheraton',
                address: 'Street, City, State - ZIP',
                phone: '+880183223344',
                email: 'radisson@email.com',
                manager_name: 'Michaed Smith',
                manager_id: 1
            }
        ]
        const fields = ['facility_id', 'facility_name', 'address', 'phone', 'email', 'manager_name', 'manager_id']
        return { facilityData, fields }
    }
}
</script>
<template>
    <DataTable :fields="fields" :facilityData="facilityData" />
</template>
