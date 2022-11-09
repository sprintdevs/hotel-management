<script setup lang="ts">
import LockClosedIcon from '../../svgs/LockClosedIcon.vue'
</script>

<template>
    <div class="flex h-screen min-h-full items-center justify-center py-12 px-4 sm:px-6 lg:px-8 bg-gray-50">
        <div class="w-full max-w-md space-y-8">
            <div>
                <RouterLink to="/">
                    <img class="mx-auto h-12 w-auto" src="../../../../public/sprintdevs.png" alt="Sprint Devs" />
                </RouterLink>
                <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-800">Sign in to your account</h2>
            </div>
            <div class="sm:mx-auto sm:w-full sm:max-w-md">
                <div class="bg-white py-12 px-4 shadow sm:rounded-lg sm:px-10">
                    <form class="space-y-6" action="#" method="POST">
                        <input type="hidden" name="remember" value="true" />
                        <div class="-space-y-px rounded-md shadow-sm">
                            <div class="-mt-6">
                                <label for="email-address" class="sr-only">Email address</label>
                                <input
                                    id="email-address"
                                    name="email"
                                    type="email"
                                    autocomplete="email"
                                    required
                                    class="relative block w-full appearance-none rounded-none rounded-t-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-cyan-500 focus:outline-none focus:ring-cyan-500 sm:text-sm"
                                    placeholder="Email address"
                                />
                            </div>
                            <div>
                                <label for="password" class="sr-only">Password</label>
                                <input
                                    id="password"
                                    name="password"
                                    type="password"
                                    autocomplete="current-password"
                                    required
                                    class="relative block w-full appearance-none rounded-none rounded-b-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-cyan-500 focus:outline-none focus:ring-cyan-500 sm:text-sm"
                                    placeholder="Password"
                                />
                            </div>
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-cyan-600 focus:ring-cyan-500" />
                                <label for="remember-me" class="ml-2 block text-sm text-gray-900">Remember me</label>
                            </div>

                            <div class="text-sm">
                                <a href="#" class="font-medium text-cyan-600 hover:text-cyan-500">Forgot your password?</a>
                            </div>
                        </div>

                        <div>
                            <button type="submit" class="group relative flex w-full justify-center rounded-md border border-transparent bg-cyan-600 py-2 px-4 text-sm font-medium text-white hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                    <LockClosedIcon class="h-5 w-5 text-cyan-500 group-hover:text-cyan-400" aria-hidden="true" />
                                </span>
                                Sign in
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
