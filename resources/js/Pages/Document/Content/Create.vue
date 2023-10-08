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
                            <div class="mb-5">
                                <span class="font-bold text-gray-600">
                                    Selected headings
                                </span>
                            </div>
                            <div
                                class="bg-gray-100 border-l-4 border-orange-500 text-gray-500 p-4 mb-2 rounded-lg flex justify-between items-center"
                            >
                                <div>
                                    <p class="font-bold">H2 Sample headings</p>
                                </div>
                                <div class="text-gray-500">
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
                                                d="M6 18L18 6M6 6l12 12"
                                            />
                                        </svg>
                                    </Link>
                                </div>
                            </div>
                            <div
                                class="bg-gray-100 border-l-4 border-orange-500 text-gray-500 p-4 mb-2 rounded-lg flex justify-between items-center"
                            >
                                <div>
                                    <p class="font-bold">H2 Sample headings</p>
                                </div>
                                <div class="text-gray-500">
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
                                                d="M6 18L18 6M6 6l12 12"
                                            />
                                        </svg>
                                    </Link>
                                </div>
                            </div>
                            <div
                                class="bg-gray-100 border-l-4 border-orange-500 text-gray-500 p-4 mb-2 rounded-lg flex justify-between items-center"
                            >
                                <div>
                                    <p class="font-bold">H2 Sample headings</p>
                                </div>
                                <div class="text-gray-500">
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
                                                d="M6 18L18 6M6 6l12 12"
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
