<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import Table from "@/Components/Table.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import TextInput from "@/Components/TextInput.vue";

defineProps({
    websites: Array,
});
const form = useForm({});
const destroy = (website) => {
    form.delete(website.routes.destroy, {
        onBefore: () =>
            confirm(
                "Are you sure you want to delete this website information?"
            ),
        preserveScroll: true,
    });
};
</script>

<template>
    <Head title="Websites" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Websites
            </h2>
        </template>
        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <div class="bg-white overflow-hidden mb-3">
                        <div class="px-6 py-4 border-b flex justify-end">
                            <Link
                                :href="route('website.create')"
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
                                    <th scope="col" class="px-6 py-3">Url</th>
                                    <th scope="col" class="px-6 py-3">Slug</th>
                                    <th scope="col" class="px-6 py-3">Token</th>
                                    <th scope="col" class="px-6 py-3 text-end">
                                        &nbsp;
                                    </th>
                                </tr>
                            </template>
                            <template #tbody>
                                <tr
                                    class="bg-white border-b"
                                    v-for="website in websites.data"
                                    :key="website.id"
                                >
                                    <td
                                        scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                                    >
                                        {{ website.url }}
                                    </td>
                                    <td
                                        scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                                    >
                                        {{ website.slug }}
                                    </td>
                                    <td
                                        scope="row"
                                        class="px-6 py-4 font-medium text-gray-400 whitespace-nowrap"
                                    >
                                        {{ website.token }}
                                    </td>
                                    <td class="px-6 py-4 text-end">
                                        <Link
                                            :href="website.routes.show"
                                            class="font-medium text-gray-300 mr-2"
                                            >Refresh</Link
                                        >

                                        <Link
                                            :href="website.routes.edit"
                                            class="font-xs text-gray-300 mr-2"
                                            >Edit</Link
                                        >

                                        <button
                                            @click="destroy(website)"
                                            class="font-xs text-gray-300 mr-2"
                                        >
                                            Remove
                                        </button>
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
