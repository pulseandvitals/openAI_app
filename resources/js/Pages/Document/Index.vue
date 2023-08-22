<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import Success from "@/Components/Alert/Success.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

defineProps({
    documents: Array,
});
const form = useForm({});
const destroy = (document) => {
    form.delete(document.routes.destroy, {
        onBefore: () =>
            confirm("Are you sure you want to delete this document?"),
        preserveScroll: true,
    });
};
</script>

<template>
    <Head title="Document" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Document
            </h2>
        </template>

        <Success />

        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <div class="bg-white overflow-hidden mb-3 sm:rounded-lg">
                        <div class="px-6 py-4 border-b flex justify-end">
                            <Link
                                :href="route('document.create')"
                                class="px-4 py-2 border border-none rounded-lg font-bold hover:shadow-lg"
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
                                        d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5"
                                    />
                                </svg>
                            </Link>
                            <Link
                                :href="route('document.create')"
                                class="px-4 py-2 border border-none rounded-lg font-bold hover:shadow-lg"
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
                                        d="M12 4.5v15m7.5-7.5h-15"
                                    />
                                </svg>
                            </Link>
                        </div>
                    </div>

                    <div
                        class="py-1"
                        v-for="document in documents.data"
                        :key="document.id"
                    >
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <div
                                class="bg-white overflow-hidden shadow-sm sm:rounded-lg"
                            >
                                <div
                                    class="px-6 py-4 border-b flex justify-between items-center"
                                >
                                    <div class="text-gray-900">
                                        {{ document.label }}
                                        <div class="text-xs text-gray-400">
                                            {{ document.orig_name }}
                                        </div>
                                    </div>

                                    <div class="font-xs text-gray-400">
                                        {{ document.created_by.name }}
                                    </div>
                                    <div class="text-xs text-gray-400">
                                        {{ document.created }}
                                    </div>

                                    <div class="text-gray-900 text-sm">
                                        <Link
                                            :href="document.routes.show"
                                            class="font-medium text-gray-300 mr-2"
                                            >View</Link
                                        >
                                        <button
                                            @click="destroy(document)"
                                            class="font-xs text-gray-300 mr-2"
                                        >
                                            Remove
                                        </button>
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
