<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import ButtonLink from "@/Components/ButtonLink.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

const props = defineProps({
    generatedPassword: String,
});
const form = useForm({
    email: "",
    name: "",
    password: props.generatedPassword,
    role: "",
});

function submit() {
    form.post(route("user.store"), {
        preserveScroll: true,
    });
}
</script>

<template>
    <Head title="Create" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 w-full">
                        <form @submit.prevent="submit" class="space-y-6">
                            <div class="">
                                <span class="text-gray-600 font-bold">
                                    User information
                                </span>
                            </div>
                            <div>
                                <InputLabel for="name" value="Name" />

                                <TextInput
                                    id="name"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.name"
                                />

                                <InputError
                                    class="mt-2"
                                    :message="form.errors.name"
                                />
                            </div>

                            <div>
                                <InputLabel for="email" value="Email" />

                                <TextInput
                                    id="email"
                                    type="email"
                                    class="mt-1 block w-full"
                                    v-model="form.email"
                                />

                                <InputError
                                    class="mt-2"
                                    :message="form.errors.email"
                                />
                            </div>

                            <div>
                                <InputLabel
                                    for="password"
                                    value="Generated Password"
                                />

                                <TextInput
                                    id="password"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.password"
                                />

                                <InputError
                                    class="mt-2"
                                    :message="form.errors.password"
                                />
                            </div>

                            <div>
                                <InputLabel for="role" value="Role" />

                                <select
                                    v-model="form.role"
                                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                                >
                                    <option value="1">Admin</option>
                                    <option value="0">User</option>
                                </select>

                                <InputError
                                    class="mt-2"
                                    :message="form.errors.role"
                                />
                            </div>

                            <div class="flex items-center gap-4">
                                <PrimaryButton
                                    :class="{ 'opacity-25': form.processing }"
                                    :disabled="form.processing"
                                    >Add</PrimaryButton
                                >
                                <ButtonLink :href="route('user.index')"
                                    >Back</ButtonLink
                                >
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
