<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
</script>

<template>
    <aside
        id="default-sidebar"
        class="h-screen fixed p-30 top-0 left-2 z-40 w-64 transition-transform"
        aria-label="Sidebar"
    >
        <a
            class="flex items-center justify-center border-none py-6 outline-none"
            href="#!"
            data-te-ripple-init
            data-te-ripple-color="primary"
        >
            <span class="font-mono font-bold text-lg">Nest18</span>
        </a>
        <div class="h-full px-3 py-4 overflow-y-auto bg-white rounded-lg">
            <ul class="space-y-2 font-medium">
                <Link
                    class="flex items-center p-2 rounded-lg text-gray-500 hover:text-white hover:bg-blue-500 group"
                    :href="route('dashboard')"
                    :class="[
                        route().current('dashboard')
                            ? 'bg-blue-500 text-white'
                            : '',
                    ]"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 d dark:text-blue-400 group-hover:text-gray-900 dark:group-hover:text-white"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"
                        />
                    </svg>

                    <span class="flex-1 ml-3 whitespace-nowrap">Dashboard</span>
                </Link>

                <div class="inline-flex items-center justify-center w-full">
                    <hr class="w-64 h-px bg-gray-300 border-0" />
                </div>

                <Link
                    class="flex items-center p-2 rounded-lg text-gray-500 hover:text-white hover:bg-blue-500 group"
                    :href="route('document.index')"
                    :class="[
                        route().current('document.*')
                            ? 'bg-blue-500 text-white'
                            : '',
                    ]"
                >
                    <svg
                        class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 d dark:text-blue-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25M9 16.5v.75m3-3v3M15 12v5.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"
                        />
                    </svg>

                    <span class="flex-1 ml-3 whitespace-nowrap">Document</span>
                </Link>

                <Link
                    class="flex items-center p-2 rounded-lg text-gray-500 hover:text-white hover:bg-blue-500 group"
                    :href="route('generator.index')"
                    :class="[
                        route().current('generator.*')
                            ? 'bg-blue-500 text-white'
                            : '',
                    ]"
                >
                    <svg
                        class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 d dark:text-blue-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor"
                        viewBox="0 0 18 18"
                    >
                        <path
                            d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z"
                        />
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">OpenAI</span>
                </Link>

                <Link
                    class="flex items-center p-2 rounded-lg text-gray-500 hover:text-white hover:bg-blue-500 group"
                    :href="route('website.index')"
                    :class="[
                        route().current('website.*')
                            ? 'bg-blue-500 text-white'
                            : '',
                    ]"
                >
                    <svg
                        class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 d dark:text-blue-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor"
                        viewBox="0 0 18 18"
                    >
                        <path
                            d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z"
                        />
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Website</span>
                </Link>

                <Link
                    class="flex items-center p-2 rounded-lg text-gray-500 hover:text-white hover:bg-blue-500 group"
                    :href="route('user.index')"
                    :class="[
                        route().current('user.*')
                            ? 'bg-blue-500 text-white'
                            : '',
                    ]"
                >
                    <svg
                        class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 d dark:text-blue-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor"
                        viewBox="0 0 18 18"
                    >
                        <path
                            d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z"
                        />
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap"
                        >User Management</span
                    >
                </Link>

                <Link
                    class="flex items-center p-2 rounded-lg text-gray-500 hover:text-white hover:bg-blue-500 group"
                    :href="route('website.index')"
                    :class="[
                        route().current('website.index')
                            ? 'bg-blue-500 text-white'
                            : '',
                    ]"
                >
                    <svg
                        class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 d dark:text-blue-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor"
                        viewBox="0 0 18 18"
                    >
                        <path
                            d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z"
                        />
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Settings</span>
                </Link>
            </ul>
        </div>
    </aside>
</template>
