<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import Success from "@/Components/Alert/Success.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import SelectedHeading from "./Partials/SelectedHeading.vue";
import extractJsonModal from "./Partials/extractJsonModal.vue";

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
        <SelectedHeading />

        <div class="py-6">
            <div class="max-w-8xl mr-80 mx-auto sm:px-6 lg:px-8">
                <div class="bg-white mb-3 rounded-lg self-start">
                    <div class="px-2 py-2">
                        <div class="flex items-center justify-between">
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
                            <extractJsonModal />
                        </div>
                    </div>
                </div>
                <ul
                    class="flex w-full space-x-4 overflow-x-scroll p-4 h-screen"
                >
                    <div
                        class="flex flex-none flex-col items-center w-1/3 bg-white mb-3 rounded-lg self-start"
                    >
                        <div class="px-6 py-4 w-full">
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
                                        <Link>Add </Link>
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
                                        <Link>Add </Link>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div
                        class="flex flex-none flex-col items-center w-1/3 bg-white mb-3 rounded-lg self-start"
                    >
                        <div class="px-6 py-4 w-full">
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
                                        <Link>Add </Link>
                                    </div>
                                </div>
                                <div
                                    class="bg-green-200 border-l-4 border-orange-500 text-gray-500 p-4 mb-2 rounded-lg flex justify-between items-center"
                                >
                                    <div>
                                        <p class="font-bold">
                                            H2 Sample headings
                                        </p>
                                    </div>
                                    <div class="text-gray-500">
                                        <Link>Add </Link>
                                    </div>
                                </div>
                                <div
                                    class="bg-green-200 border-l-4 border-orange-500 text-gray-500 p-4 mb-2 rounded-lg flex justify-between items-center"
                                >
                                    <div>
                                        <p class="font-bold">
                                            H2 Sample headings
                                        </p>
                                    </div>
                                    <div class="text-gray-500">
                                        <Link>Add </Link>
                                    </div>
                                </div>
                                <div
                                    class="bg-green-200 border-l-4 border-orange-500 text-gray-500 p-4 mb-2 rounded-lg flex justify-between items-center"
                                >
                                    <div>
                                        <p class="font-bold">
                                            H2 Sample headings
                                        </p>
                                    </div>
                                    <div class="text-gray-500">
                                        <Link>Add </Link>
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
                                        <Link>Add </Link>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div
                        class="flex flex-none flex-col items-center w-1/3 bg-white mb-3 rounded-lg self-start"
                    >
                        <div class="px-6 py-4 w-full">
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
                                        <Link>Add </Link>
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
                                        <Link>Add </Link>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div
                        class="flex flex-none flex-col items-center w-1/3 bg-white mb-3 rounded-lg self-start"
                    >
                        <div class="px-6 py-4 w-full">
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
                                        <Link>Add </Link>
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
                                        <Link>Add </Link>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div
                        class="flex flex-none flex-col items-center w-1/3 bg-white mb-3 rounded-lg self-start"
                    >
                        <div class="px-6 py-4 w-full">
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
                                        <Link>Add </Link>
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
                                        <Link>Add </Link>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div
                        class="flex flex-none flex-col items-center w-1/3 bg-white mb-3 rounded-lg self-start"
                    >
                        <div class="px-6 py-4 w-full">
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
                                        <Link>Add </Link>
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
                                        <Link>Add </Link>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div
                        class="flex flex-none flex-col items-center w-1/3 bg-white mb-3 rounded-lg self-start"
                    >
                        <div class="px-6 py-4 w-full">
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
                                        <Link>Add </Link>
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
                                        <Link>Add </Link>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </ul>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
