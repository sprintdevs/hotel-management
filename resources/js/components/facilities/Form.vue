<script setup lang="ts"></script>
<template>
    <form action="submit" class="space-y-8 divide-y divide-gray-200">
        <div class="pt-8">
            <div class="sm:col-span-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <div class="mt-1">
                    <input id="name" name="name" type="text" autocomplete="name" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                </div>
            </div>

            <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                <div class="sm:col-span-3">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <div class="mt-1">
                        <input id="email" name="email" type="email" autocomplete="email" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                    <div class="mt-1">
                        <input type="text" name="phone" id="phone" autocomplete="phone" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                    </div>
                </div>

                <div class="sm:col-span-6">
                    <label for="street-address" class="block text-sm font-medium text-gray-700">Street</label>
                    <div class="mt-1">
                        <input type="text" name="street-address" id="street-address" autocomplete="street-address" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                    </div>
                </div>

                <div class="sm:col-span-2">
                    <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                    <div class="mt-1">
                        <select id="city" name="city" autocomplete="city" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            <option v-for="city in cities" :value="city">{{ city }}</option>
                        </select>
                    </div>
                </div>

                <div class="sm:col-span-2">
                    <label for="region" class="block text-sm font-medium text-gray-700">State</label>
                    <div class="mt-1">
                        <select id="city" name="city" autocomplete="city" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            <option v-for="state in states" :value="state">{{ state }}</option>
                        </select>
                    </div>
                </div>

                <div class="sm:col-span-2">
                    <label for="postal-code" class="block text-sm font-medium text-gray-700">ZIP</label>
                    <div class="mt-1">
                        <input type="text" name="postal-code" id="postal-code" autocomplete="postal-code" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                    </div>
                </div>

                <div class="sm:col-span-6">
                    <label for="manager" class="block text-sm font-medium text-gray-700">Manager</label>
                    <div class="mt-1">
                        <select id="city" name="city" autocomplete="city" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            <option v-for="manager in managers" :value="manager">{{ manager }}</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="pt-5">
            <div class="flex justify-end">
                <button type="submit" class="ml-3 inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Submit</button>
            </div>
        </div>
    </form>
</template>

<script>
export default {
    data() {
        return {
            active: false,
            selected: 'Dhaka',
            cities: ['Dhaka', 'Rajshahi', 'Chittagong', 'Rangpur', 'Barishal'],
            states: ['Dhaka', 'Rajshahi', 'Chittagong', 'Maymensingh'],
            managers: ['Rafi', 'Shakil', 'Shourav', 'Rahee', 'Tushar', 'Hamim']
        }
    }
}
</script>
