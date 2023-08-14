<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

let props = defineProps({
    content: Object,
});
const form = useForm({
    content: props.content,
});
</script>

<template>
    <Head title="Generator" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Generator
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
                        <h3 class="text-xl font-bold">
                            Generate message with the help of AI.
                        </h3>
                        <form
                            @submit.prevent="
                                form.post(route('generator.generate-content'))
                            "
                            class="mt-6 space-y-6"
                        >
                            <div>
                                <InputLabel
                                    for="content"
                                    value="Ask AI here.."
                                />

                                <textarea
                                    type="text"
                                    rows="3"
                                    class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                    v-model="form.content"
                                />

                                <InputError
                                    class="mt-2"
                                    :message="form.errors.content"
                                />
                            </div>

                            <div class="flex items-center gap-4">
                                <PrimaryButton :disabled="form.processing"
                                    >Generate</PrimaryButton
                                >
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
