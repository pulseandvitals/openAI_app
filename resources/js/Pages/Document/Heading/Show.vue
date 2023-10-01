<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import Success from "@/Components/Alert/Success.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextAreaEditor from "@/Components/TextAreaEditor.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

let props = defineProps({
    heading: Object,
});

let form = useForm({
    header: props.heading.keyword,
});
</script>

<template>
    <Head title="Heading" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Heading
            </h2>
        </template>

        <Success />

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="items-end">
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
                </div>

                <div class="grid grid-cols-2 gap-5">
                    <div class="bg-white mb-3 rounded-lg self-start">
                        <div class="px-6 py-4">
                            <div class="flex justify-between mb-2">
                                <InputLabel
                                    for="heading_selection"
                                    value="Search Engine Result Pages (3)"
                                />
                            </div>

                            <div class="px-2 py-3">
                                <div
                                    class="bg-gray-100 border-l-4 border-orange-500 text-gray-500 p-2 mb-2 rounded-lg"
                                    role="alert"
                                >
                                    <p class="font-bold">H2</p>
                                    <p>
                                        Search result of SERPs (Incomplete, for
                                        Regie's SERPs result App)
                                    </p>
                                </div>
                                <div
                                    class="bg-gray-100 border-l-4 border-blue-500 text-gray-500 p-2 mb-2 rounded-lg"
                                    role="alert"
                                >
                                    <p class="font-bold">H3</p>
                                    <p>
                                        Search result of SERPs (Incomplete, for
                                        Regie's SERPs result App)
                                    </p>
                                </div>
                                <div
                                    class="bg-gray-100 border-l-4 border-green-500 text-gray-500 p-2 mb-2 rounded-lg"
                                    role="alert"
                                >
                                    <p class="font-bold">H4</p>
                                    <p>
                                        Search result of SERPs (Incomplete, for
                                        Regie's SERPs result App)
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="overflow-hidden">
                        <div class="bg-white mb-3 rounded-lg">
                            <div class="px-6 py-4">
                                <InputLabel
                                    for="heading_selection"
                                    value="Selected headings"
                                />
                                <TextAreaEditor
                                    class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                    v-model="form.header"
                                />
                                <span class="text-gray-300 text-xs">
                                    Please note that this section inputs all the
                                    data of your selected headings.
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="py-3 px-3 flex justify-end">
                    <PrimaryButton>
                        Proceed to Article Writing
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
                                d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"
                            />
                        </svg>
                    </PrimaryButton>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
