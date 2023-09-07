<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import Table from "@/Components/Table.vue";
import EditUserModal from "./Partials/EditUserModal.vue";
import Success from "@/Components/Alert/Success.vue";
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

        <Success />

        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <div class="bg-white overflow-hidden mb-3 rounded-lg">
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

                    <div class="p-4 bg-white rounded-lg">
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
                                        <EditUserModal :user="user" />

                                        <button
                                            @click="destroy(user)"
                                            class="font-xs text-gray-300 mr-2"
                                        >
                                            <svg
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
                                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
                                                />
                                            </svg>
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
