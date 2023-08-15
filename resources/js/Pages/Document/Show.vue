<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import Table from "@/Components/Table.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

defineProps({
    documents: Array,
    file_name: String,
});
</script>

<template>
    <Head title="Document" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ file_name }}
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <div class="bg-white overflow-hidden mb-3">
                        <div class="px-6 py-4 border-b flex justify-end">
                            <Link
                                :href="route('document.create')"
                                class="px-4 py-2 text-black border border-none font-bold"
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

                    <div class="p-4 bg-white">
                        <Table>
                            <template #thead>
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Sample
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Sample
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Sample
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Sample
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Sample
                                    </th>
                                </tr>
                            </template>
                            <template #tbody>
                                <tr
                                    class="bg-white border-b"
                                    v-for="document in documents"
                                    :key="document.id"
                                >
                                    <td
                                        scope="row"
                                        class="px-6 py-4 font-bold text-gray-900 whitespace-nowrap"
                                    >
                                        {{ document.quarter }}
                                    </td>
                                    <td
                                        scope="row"
                                        class="px-6 py-4 font-bold text-gray-900 whitespace-nowrap"
                                    >
                                        {{ document.ser_ref }}
                                    </td>
                                    <td
                                        scope="row"
                                        class="px-6 py-4 font-bold text-gray-900 whitespace-nowrap"
                                    >
                                        {{ document.industry_code }}
                                    </td>
                                    <td
                                        scope="row"
                                        class="px-6 py-4 font-bold text-gray-900 whitespace-nowrap"
                                    >
                                        {{ document.industry_name }}
                                    </td>
                                    <td
                                        scope="row"
                                        class="px-6 py-4 font-bold text-gray-900 whitespace-nowrap"
                                    >
                                        {{ document.filled_jobs }}
                                    </td>
                                </tr>
                            </template>
                        </Table>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
