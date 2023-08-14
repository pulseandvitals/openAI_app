<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

let props = defineProps({
    website: Object,
});
const form = useForm({
    url: props.website.url,
});
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="px-6 py-4 border-b flex items-center gap-6">
                        <Link
                            :href="route('website.index')"
                            class="px-4 py-2 rounded-lg font-bold flex items-center gap-4"
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
                    </div>
                    <div class="p-6 w-full">
                        <h3 class="text-xl font-bold">{{ website.url }}</h3>
                        <form
                            @submit.prevent="
                                form.patch(route('website.update', website))
                            "
                            class="mt-6 space-y-6"
                        >
                            <div>
                                <InputLabel for="url" value="Url" />

                                <TextInput
                                    id="type"
                                    type="text"
                                    class="mt-1 block w-full"
                                    placeholder="eg: www.sample.com"
                                    v-model="form.url"
                                />

                                <InputError
                                    class="mt-2"
                                    :message="form.errors.url"
                                />
                            </div>

                            <div class="flex items-center gap-4">
                                <PrimaryButton :disabled="form.processing"
                                    >Update</PrimaryButton
                                >
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
