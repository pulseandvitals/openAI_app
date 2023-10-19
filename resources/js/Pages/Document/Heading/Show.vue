<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import Success from "@/Components/Alert/Success.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import SelectedHeading from "./Partials/SelectedHeading.vue";
import extractJsonModal from "./Partials/extractJsonModal.vue";
import { nextTick, ref } from "vue";

let props = defineProps({
    heading: Object,
    extractedData: Object,
});
let selectedLabels = ref([]);
let form = useForm({
    header: props.heading.keyword,
    selectedHead: selectedLabels,
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

        <SelectedHeading
            :selectedHeading="form.selectedHead"
            :heading="heading"
        />

        <div class="py-6">
            <div class="max-w-8xl mr-80 mx-auto sm:px-6 lg:px-8">
                <div class="bg-white mb-3 rounded-lg self-start">
                    <div class="px-2 py-2">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
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
                                <span class="font-bold text-gray-400">
                                    Selected Headings ({{
                                        form.selectedHead.length
                                    }})
                                </span>
                            </div>
                            <extractJsonModal :keyword="heading.keyword" />
                        </div>
                    </div>
                </div>
                <ul
                    class="flex w-full space-x-4 overflow-x-scroll p-4 h-screen"
                >
                    <div
                        class="flex flex-none flex-col items-center w-1/3 bg-white mb-3 rounded-lg self-start"
                        v-for="e in extractedData.serps"
                        :key="e.id"
                    >
                        <div class="px-6 py-4 w-full">
                            <div class="flex justify-between">
                                <div></div>
                                <div class="">
                                    <div class="flex items-center mb-4">
                                        <input
                                            id="default-checkbox"
                                            type="checkbox"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2"
                                        />
                                        <label
                                            for="default-checkbox"
                                            class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                            >All</label
                                        >
                                    </div>
                                </div>
                            </div>

                            <a
                                :href="e.url"
                                target="_blank"
                                class="text-gray-500 text-xs"
                                >{{ e.url }}</a
                            >

                            <div
                                class="bg-gray-100 text-gray-500 p-4 mb-2 rounded-lg flex justify-between items-center hover:bg-gray-200"
                                v-for="b in e.contents.article_outline"
                                :key="b.id"
                                :class="[
                                    b.header_type == 'h1' ? 'orange-500' : '',
                                    b.header_type == 'h2'
                                        ? 'border-l-4 border-blue-500'
                                        : '',
                                    b.header_type == 'h3'
                                        ? 'border-l-4 border-purple-500'
                                        : '',
                                    b.header_type == 'h4'
                                        ? 'border-l-4 border-green-500'
                                        : '',
                                    b.header_type == 'h5'
                                        ? 'border-l-4 border-red-500'
                                        : '',
                                    b.header_type == 'h6'
                                        ? 'border-l-4 border-yellow-500'
                                        : '',
                                ]"
                            >
                                <div class="flex items-center">
                                    <p
                                        class="uppercase font-bold mr-2 text-xs px-2.5 rounded"
                                        :class="[
                                            b.header_type == 'h1'
                                                ? 'dark:text-orange-400 border border-orange-400'
                                                : '',
                                            b.header_type == 'h2'
                                                ? 'dark:text-blue-400 border border-blue-400'
                                                : '',
                                            b.header_type == 'h3'
                                                ? 'dark:text-purple-400 border border-purple-400'
                                                : '',
                                            b.header_type == 'h4'
                                                ? 'dark:text-green-400 border border-green-400'
                                                : '',
                                            b.header_type == 'h5'
                                                ? 'dark:text-red-400 border border-red-400'
                                                : '',
                                            b.header_type == 'h6'
                                                ? 'dark:text-yellow-400 border border-yellow-400'
                                                : '',
                                        ]"
                                    >
                                        {{
                                            b.header_type != "h1"
                                                ? b.header_type
                                                : "title"
                                        }}
                                    </p>
                                    <p
                                        class="font-xs"
                                        :class="[
                                            b.header_type == 'h1'
                                                ? 'font-bold'
                                                : '',
                                        ]"
                                    >
                                        {{ b.header_title }}
                                    </p>
                                </div>
                                <div
                                    class="text-gray-700"
                                    v-if="b.header_type != 'h1'"
                                >
                                    <input
                                        type="checkbox"
                                        class="border-gray-300 rounded-lg text-green-600"
                                        :value="b"
                                        v-model="form.selectedHead"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </ul>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
