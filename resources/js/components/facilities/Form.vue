<script lang="ts" setup>

</script>

<template>
    <form action="submit" class="space-y-8 p-6">
        <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
            <div class="sm:col-span-6">
                <TextInput v-model="event.name" label="Name" type="text" />
            </div>

            <div class="sm:col-span-3">
                <TextInput v-model="event.email" label="Email" type="text" />
            </div>

            <div class="sm:col-span-3">
                <TextInput v-model="event.phone" label="Phone" type="text" />
            </div>

            <div class="sm:col-span-6">
                <TextInput v-model="event.location" label="Street" type="text" />
            </div>

            <div class="sm:col-span-2">
                <DropDown label="City" placeholder="Select City" :options="cityOptions" />
            </div>

            <div class="sm:col-span-2">
                <DropDown label="State" placeholder="Select State" :options="stateOptions" />
            </div>

            <div class="sm:col-span-2">
                <TextInput v-model="event.zip" label="ZIP" type="text" />
            </div>

            <div class="sm:col-span-6">
                <DropDown label="Manager" placeholder="Select Manager" :options="managerOptions" />
            </div>
        </div>

        <div class="flex justify-end">
            <div class="flex justify-center items-center gap-x-3">
                <RouterLink to="/facilities">
                    <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-gray-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">Back</button>
                </RouterLink>

                <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-cyan-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2">Submit</button>
            </div>
        </div>
    </form>
</template>

<script>
import TextInput from '../TextInput.vue'
import DropDown from '../DropDown.vue'
export default {
    data() {
        return {
            active: false,
            managers: ['Rafi', 'Shakil', 'Shourav', 'Rahee', 'Tushar', 'Hamim'],
            selectedState: 'Apple',
            stateOptions: {
                Dhaka: 'Dhaka',
                Rajshahi: 'Rajshahi',
                Chittagong: 'Chittagong',
                Maymensingh: 'Maymensingh'
            },
            selectedCity: 'Dhaka',
            cityOptions: {
                Dhaka: 'Dhaka',
                Rajshahi: 'Rajshahi',
                Chittagong: 'Chittagong',
                Maymensingh: 'Maymensingh'
            },
            selectedManager: 'R',
            managerOptions: {
                Rafi: 'Rafi',
                Shakil: 'Shakil',
                Tushar: 'Tushar'
            },
            event: {
                name: '',
                phone: '',
                email: '',
                location: '',
                option: '',
                street: '',
                city: '',
                state: '',
                manager: '',
                zip: ''
            }
        }
    },
    components: { TextInput, DropDown }
}
</script>
