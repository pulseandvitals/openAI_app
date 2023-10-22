<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import Success from "@/Components/Alert/Success.vue";
import { nextTick, ref } from "vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextAreaEditor from "@/Components/TextAreaEditor.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

const props = defineProps({
    selectedHeadings: Array,
    titleHeading: Object,
    editableHeadings: String,
});
let form = useForm({
    selected: props.editableHeadings,
    title: props.titleHeading,
});
const destroy = (heading) => {
    form.delete(
        route("document.content-brief.destroy", {
            heading: heading,
            onBefore: () =>
                confirm("Are you sure you want to delete this heading?"),
            preserveScroll: true,
        })
    );
};
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
                    <PrimaryButton
                        class="px-4 items-center py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase hover:bg-blue-600 focus:bg-blue-700 active:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                    >
                        Proceed to Content Writer
                    </PrimaryButton>
                </div>

                <Success />

                <div class="bg-white rounded-lg self-start">
                    <div class="py-4 px-4">
                        <div class="mb-5 flex justify-between">
                            <span class="font-bold text-gray-600">
                                Selected headings
                            </span>
                        </div>
                        <div
                            class="bg-white mb-3 rounded-lg self-start"
                            v-for="selected in selectedHeadings"
                            :key="selected.position_order"
                        >
                            <div
                                class="bg-gray-100 text-gray-500 p-4 mb-2 rounded-lg flex justify-between items-center hover:bg-gray-200"
                                :class="[
                                    selected.heading_type == 'h1'
                                        ? 'border-l-4 border-orange-500'
                                        : '',
                                    selected.heading_type == 'h2'
                                        ? 'border-l-4 border-blue-500'
                                        : '',
                                    selected.heading_type == 'h3'
                                        ? 'border-l-4 border-purple-500'
                                        : '',
                                    selected.heading_type == 'h4'
                                        ? 'border-l-4 border-green-500'
                                        : '',
                                    selected.heading_type == 'h5'
                                        ? 'border-l-4 border-red-500'
                                        : '',
                                    selected.heading_type == 'h6'
                                        ? 'border-l-4 border-yellow-500'
                                        : '',
                                ]"
                            >
                                <div class="flex items-center">
                                    <p
                                        class="text-xs font-medium mr-2 px-2.5 rounded uppercase"
                                        :class="[
                                            selected.heading_type == 'h1'
                                                ? 'dark:text-orange-400 border border-orange-400'
                                                : '',
                                            selected.heading_type == 'h2'
                                                ? 'dark:text-blue-400 border border-blue-400'
                                                : '',
                                            selected.heading_type == 'h3'
                                                ? 'dark:text-purple-400 border border-purple-400'
                                                : '',
                                            selected.heading_type == 'h4'
                                                ? 'dark:text-green-400 border border-green-400'
                                                : '',
                                            selected.heading_type == 'h5'
                                                ? 'dark:text-red-400 border border-red-400'
                                                : '',
                                            selected.heading_type == 'h6'
                                                ? 'dark:text-yellow-400 border border-yellow-400'
                                                : '',
                                        ]"
                                    >
                                        {{ selected.heading_type }}
                                    </p>
                                    <span class="text-xs">
                                        {{ selected.heading_title }}</span
                                    >
                                </div>

                                <div class="text-gray-500 flex items-center">
                                    <Link @click="destroy(selected)"
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
                <div class="flex justify-between mt-2">
                    <div></div>
                    <PrimaryButton
                        class="px-4 items-center py-3 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase hover:bg-blue-600 focus:bg-blue-700 active:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                    >
                        Proceed to Content Writer
                    </PrimaryButton>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
