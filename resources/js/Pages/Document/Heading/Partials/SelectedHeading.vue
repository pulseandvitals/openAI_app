<script setup>
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import ModalRight from "@/Components/ModalRight.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import { nextTick, ref } from "vue";
</script>
<template>
    <aside
        id="sidebar-multi-level-sidebar"
        class="fixed top-0 right-0 z-40 w-80 h-screen transition-transform -translate-x-full sm:translate-x-0 border-4 rounded-lg"
        aria-label="Sidebar"
    >
        <div class="h-full px-3 py-4 overflow-y-auto bg-white shadow-sm">
            <div class="mb-5">
                <span class="font-bold"> Selected Headings </span>
            </div>
            <div class="bg-white mb-3 rounded-lg self-start">
                <div
                    class="bg-gray-100 border-l-4 border-orange-500 text-gray-500 p-4 mb-2 rounded-lg flex justify-between items-center"
                >
                    <div class="flex items-center">
                        <p
                            class="bg-orange-100 text-xs font-medium mr-2 px-2.5 rounded dark:text-orange-400 border border-orange-400"
                        >
                            H2
                        </p>
                        <span class="font-medium"> Sample heading text. </span>
                    </div>

                    <div class="text-gray-500 flex items-center">
                        <Link
                            ><svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="w-6 h-6"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                />
                            </svg>
                        </Link>
                    </div>
                </div>

                <div
                    class="bg-gray-100 border-l-4 border-orange-500 text-gray-500 p-4 mb-2 rounded-lg flex justify-between items-center"
                >
                    <div class="flex items-center">
                        <p
                            class="bg-orange-100 text-xs font-medium mr-2 px-2.5 rounded dark:text-orange-400 border border-orange-400"
                        >
                            H2
                        </p>
                        <span class="font-medium"> Sample heading text. </span>
                    </div>

                    <div class="text-gray-500 flex items-center">
                        <Link
                            ><svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="w-6 h-6"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                />
                            </svg>
                        </Link>
                    </div>
                </div>
                <div
                    class="bg-gray-100 border-l-4 border-orange-500 text-gray-500 p-4 mb-2 rounded-lg flex justify-between items-center"
                >
                    <div class="flex items-center">
                        <p
                            class="bg-orange-100 text-xs font-medium mr-2 px-2.5 rounded dark:text-orange-400 border border-orange-400"
                        >
                            H2
                        </p>
                        <span class="font-medium"> Sample heading text. </span>
                    </div>

                    <div class="text-gray-500 flex items-center">
                        <Link
                            ><svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="w-6 h-6"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                />
                            </svg>
                        </Link>
                    </div>
                </div>
            </div>

            <div class="flex justify-center">
                <Link
                    :href="route('document.content-brief.create')"
                    class="absolute bottom-2 px-4 inline-flex items-center py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-600 focus:bg-blue-700 active:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                >
                    Proceed to Content Brief
                </Link>
            </div>
        </div>
    </aside>
</template>
