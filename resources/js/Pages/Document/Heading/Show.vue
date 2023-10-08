<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import Success from "@/Components/Alert/Success.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import HeadingEditorModal from "./Partials/HeadingEditorModal.vue";

let props = defineProps({
    heading: Object,
});
let form = useForm({
    header: props.heading.keyword,
});
</script>

<template>
    <Head title="Heading" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Heading
            </h2>
        </template>

        <Success />

        <div class="py-12">
            <div class="max-w-12xl mx-auto sm:px-6 lg:px-8">
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
                    <HeadingEditorModal :header="form.header" />
                </div>
                <div class="bg-white mb-3 rounded-lg self-start">
                    <div class="px-6 py-4">
                        <span class="text-gray-600"
                            >Number of selected headings.
                        </span>
                        <span class="text-gray-700 font-bold">(4)</span>
                    </div>
                </div>

                <div class="grid grid-cols-4 gap-5">
                    <div class="bg-white mb-3 rounded-lg self-start">
                        <div class="px-6 py-4">
                            <div class="">
                                <span class="font-bold text-sm text-gray-600">
                                    Montana Title here..
                                </span>
                            </div>
                            <div class="">
                                <span class="font-bold text-xs text-gray-400">
                                    www.sample.com/ewww-qwe
                                </span>
                            </div>

                            <div class="py-2">
                                <div
                                    class="bg-green-200 border-l-4 border-orange-500 text-gray-500 p-4 mb-2 rounded-lg flex justify-between items-center"
                                >
                                    <div>
                                        <p class="font-bold">
                                            H2 Sample headings
                                        </p>
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
                                                    d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"
                                                />
                                            </svg>
                                        </Link>
                                    </div>
                                </div>
                                <div
                                    class="bg-gray-100 border-l-4 border-blue-500 text-gray-500 p-4 mb-2 rounded-lg flex justify-between items-center"
                                >
                                    <div>
                                        <p class="font-bold">
                                            H1 Sample headings
                                        </p>
                                    </div>
                                    <div class="text-gray-500">
                                        <Link>Add </Link>
                                    </div>
                                </div>
                                <div
                                    class="bg-gray-100 border-l-4 border-red-500 text-gray-500 p-4 mb-2 rounded-lg flex justify-between items-center"
                                >
                                    <div>
                                        <p class="font-bold">
                                            H3 Search result
                                        </p>
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
                                                    d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"
                                                />
                                            </svg>
                                        </Link>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white mb-3 rounded-lg self-start">
                        <div class="px-6 py-4">
                            <div class="">
                                <span class="font-bold text-sm text-gray-600">
                                    Montana Title here..
                                </span>
                            </div>
                            <div class="">
                                <span class="font-bold text-xs text-gray-400">
                                    www.sample.com/ewww-qwe
                                </span>
                            </div>

                            <div class="py-2">
                                <div
                                    class="bg-green-200 border-l-4 border-orange-500 text-gray-500 p-4 mb-2 rounded-lg flex justify-between items-center"
                                >
                                    <div>
                                        <p class="font-bold">
                                            H2 Sample headings
                                        </p>
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
                                                    d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"
                                                />
                                            </svg>
                                        </Link>
                                    </div>
                                </div>
                                <div
                                    class="bg-gray-100 border-l-4 border-blue-500 text-gray-500 p-4 mb-2 rounded-lg flex justify-between items-center"
                                >
                                    <div>
                                        <p class="font-bold">
                                            H1 Sample headings
                                        </p>
                                    </div>
                                    <div class="text-gray-500">
                                        <Link>Add </Link>
                                    </div>
                                </div>
                                <div
                                    class="bg-gray-100 border-l-4 border-red-500 text-gray-500 p-4 mb-2 rounded-lg flex justify-between items-center"
                                >
                                    <div>
                                        <p class="font-bold">
                                            H3 Search result
                                        </p>
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
                                                    d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"
                                                />
                                            </svg>
                                        </Link>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white mb-3 rounded-lg self-start">
                        <div class="px-6 py-4">
                            <div class="">
                                <span class="font-bold text-sm text-gray-600">
                                    Montana Title here..
                                </span>
                            </div>
                            <div class="">
                                <span class="font-bold text-xs text-gray-400">
                                    www.sample.com/ewww-qwe
                                </span>
                            </div>

                            <div class="py-2">
                                <div
                                    class="bg-green-200 border-l-4 border-orange-500 text-gray-500 p-4 mb-2 rounded-lg flex justify-between items-center"
                                >
                                    <div>
                                        <p class="font-bold">
                                            H2 Sample headings
                                        </p>
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
                                                    d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"
                                                />
                                            </svg>
                                        </Link>
                                    </div>
                                </div>
                                <div
                                    class="bg-gray-100 border-l-4 border-blue-500 text-gray-500 p-4 mb-2 rounded-lg flex justify-between items-center"
                                >
                                    <div>
                                        <p class="font-bold">
                                            H1 Sample headings
                                        </p>
                                    </div>
                                    <div class="text-gray-500">
                                        <Link>Add </Link>
                                    </div>
                                </div>
                                <div
                                    class="bg-gray-100 border-l-4 border-red-500 text-gray-500 p-4 mb-2 rounded-lg flex justify-between items-center"
                                >
                                    <div>
                                        <p class="font-bold">
                                            H3 Search result
                                        </p>
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
                                                    d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"
                                                />
                                            </svg>
                                        </Link>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white mb-3 rounded-lg self-start">
                        <div class="px-6 py-4">
                            <div class="">
                                <span class="font-bold text-sm text-gray-600">
                                    Montana Title here..
                                </span>
                            </div>
                            <div class="">
                                <span class="font-bold text-xs text-gray-400">
                                    www.sample.com/ewww-qwe
                                </span>
                            </div>

                            <div class="py-2">
                                <div
                                    class="bg-green-200 border-l-4 border-orange-500 text-gray-500 p-4 mb-2 rounded-lg flex justify-between items-center"
                                >
                                    <div>
                                        <p class="font-bold">
                                            H2 Sample headings
                                        </p>
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
                                                    d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"
                                                />
                                            </svg>
                                        </Link>
                                    </div>
                                </div>
                                <div
                                    class="bg-gray-100 border-l-4 border-blue-500 text-gray-500 p-4 mb-2 rounded-lg flex justify-between items-center"
                                >
                                    <div>
                                        <p class="font-bold">
                                            H1 Sample headings
                                        </p>
                                    </div>
                                    <div class="text-gray-500">
                                        <Link>Add </Link>
                                    </div>
                                </div>
                                <div
                                    class="bg-gray-100 border-l-4 border-red-500 text-gray-500 p-4 mb-2 rounded-lg flex justify-between items-center"
                                >
                                    <div>
                                        <p class="font-bold">
                                            H3 Search result
                                        </p>
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
                                                    d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"
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
        </div>
    </AuthenticatedLayout>
</template>
