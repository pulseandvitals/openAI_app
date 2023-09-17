<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import Success from "@/Components/Alert/Success.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

defineProps({
    article: Object,
});
</script>

<template>
    <Head :title="article.keyword" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ article.keyword }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="items-end">
                    <Link
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
                </div>
                <div class="grid grid-cols-2 gap-5"></div>
                <div class="overflow-hidden">
                    <div class="bg-white mb-3 rounded-lg">
                        <div class="px-6 py-4">Keywords (Input field)</div>
                    </div>

                    <div class="bg-white mb-3 rounded-lg">
                        <div class="px-6 py-4">
                            Additional Info (Input field, separated with comma)
                        </div>
                    </div>

                    <div class="bg-white mb-3 rounded-lg">
                        <div class="px-6 py-4">
                            Additional Info for outline and more
                            (Checkboxes,textfields,Select)
                        </div>
                    </div>

                    <div class="bg-white mb-3 rounded-lg">
                        <div class="px-6 py-4">
                            AI Prompts (TextArea, Editable)
                        </div>
                    </div>
                    <div class="flex justify-content-end">
                        <PrimaryButton> Generate </PrimaryButton>
                        <PrimaryButton
                            class="ml-2 bg-green-500 hover:bg-green-600"
                        >
                            Submit
                        </PrimaryButton>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
