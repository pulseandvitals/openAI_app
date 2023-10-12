<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextAreaEditor from "@/Components/TextAreaEditor.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
</script>
<template>
    <Head title="Content Brief" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Content Brief
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-between mb-2">
                    <Link
                        href="#"
                        onclick="history.back(); return false;"
                        class="px-4 py-2 rounded-lg font-bold flex items-center gap-1"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="w-4 h-4"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18"
                            />
                        </svg>

                        Back
                    </Link>
                </div>
                <div class="grid grid-cols-2 gap-5">
                    <div class="bg-white rounded-lg self-start">
                        <div class="px-6 py-4">
                            <div class="px-2 py-3">
                                <TextAreaEditor
                                    class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                />
                                <span class="text-gray-300 text-xs">
                                    Please note that this section will finalize
                                    all of the headings and informations for
                                    creating an article.
                                </span>
                                <div>
                                    <span class="text-gray-500 text-xs"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg self-start">
                        <div class="py-4 px-4">
                            <div class="mb-5 flex justify-between">
                                <span class="font-bold text-gray-600">
                                    Selected headings
                                </span>
                                <Link class="font-medium text-gray-400">
                                    Paste
                                </Link>
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
                                    <span class="font-medium">
                                        Sample heading text.
                                    </span>
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
                                    <span class="font-medium">
                                        Sample heading text.
                                    </span>
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
                                    <span class="font-medium">
                                        Sample heading text.
                                    </span>
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
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
