login

<script setup lang="ts"></script>

<template>
    <div class="flex min-h-full flex-col justify-center py-12 sm:px-6 lg:px-8">
        <img class="object-scale-down h-14" src="sprintdevs.png" alt="Sprint Devs" />
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Sign In</h2>
        </div>
        <form class="mt-8 space-y-6" action="#" method="POST">
            <input type="hidden" name="remember" value="true" />
            <div class="-space-y-px rounded-md shadow-sm">
                <div>
                    <label for="email-address" class="sr-only">Email address</label>
                    <input
                        id="email-address"
                        name="email"
                        type="email"
                        autocomplete="email"
                        required
                        class="relative block w-full appearance-none rounded-none rounded-t-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                        placeholder="Email address"
                    />
                </div>
                <div>
                    <label for="password" class="sr-only">Password</label>
                    <input
                        id="password"
                        name="password"
                        type="password"
                        required
                        class="relative mt-4 block w-full appearance-none rounded-none rounded-b-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                        placeholder="Password"
                    />
                </div>
            </div>
            <div>
                <button type="submit" class="group relative flex w-full justify-center rounded-md border border-transparent bg-cyan-600 py-2 px-4 text-sm font-medium text-white hover:bg-cyan-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Sign in</button>
            </div>
        </form>
    </div>
</template>
