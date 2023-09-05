<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import Table from "@/Components/Table.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

defineProps({
    users: Array,
});
const form = useForm({});
const destroy = (user) => {
    form.delete(user.routes.destroy, {
        onBefore: () =>
            confirm("Are you sure you want to delete this user information?"),
        preserveScroll: true,
    });
};
</script>

<template>
    <Head title="Users" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Users
            </h2>
        </template>
        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <div class="bg-white overflow-hidden mb-3">
                        <div class="px-6 py-4 border-b flex justify-end">
                            <Link
                                :href="route('user.create')"
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

                    <div class="p-4 bg-white">
                        <Table>
                            <template #thead>
                                <tr>
                                    <th scope="col" class="px-6 py-3">Name</th>
                                    <th scope="col" class="px-6 py-3">Email</th>
                                    <th scope="col" class="px-6 py-3">
                                        Created
                                    </th>
                                    <th scope="col" class="px-6 py-3">Role</th>
                                    <th scope="col" class="px-6 py-3 text-end">
                                        &nbsp;
                                    </th>
                                </tr>
                            </template>
                            <template #tbody>
                                <tr
                                    class="bg-white border-b"
                                    v-for="user in users.data"
                                    :key="user.id"
                                >
                                    <td
                                        scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                                    >
                                        {{ user.name }}
                                    </td>
                                    <td
                                        scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                                    >
                                        {{ user.email }}
                                    </td>
                                    <td
                                        scope="row"
                                        class="px-6 py-4 font-medium text-gray-400 whitespace-nowrap"
                                    >
                                        {{ user.created }}
                                    </td>
                                    <td
                                        scope="row"
                                        class="px-6 py-4 font-medium text-gray-400 whitespace-nowrap"
                                    >
                                        <div
                                            :class="[
                                                user.role == 'Admin'
                                                    ? 'bg-green-100 text-green-800 text-xs font-medium text-center px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300'
                                                    : 'bg-blue-100 text-blue-800 text-xs font-medium text-center px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-blue-300',
                                            ]"
                                        >
                                            {{ user.role }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-end">
                                        <Link
                                            :href="user.routes.edit"
                                            class="font-xs text-gray-300 mr-2"
                                            >Edit</Link
                                        >

                                        <button
                                            @click="destroy(user)"
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
