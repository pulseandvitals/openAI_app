<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

const form = useForm({
    label: "",
    url: "",
});
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
            <div class="max-w-3xl mx-auto sm:px-6 lg:px-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="px-6 py-4 border-b flex items-center gap-6">
                        <Link
                            :href="route('document.index')"
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
                        <h3 class="text-xl font-bold">Upload CSV/Excel File</h3>
                        <form
                            @submit.prevent="form.post(route('document.store'))"
                            class="mt-6 space-y-6"
                            enctype="multipart/form-data"
                        >
                            <div>
                                <TextInput
                                    id="type"
                                    type="text"
                                    class="mt-1 block w-full"
                                    placeholder="Title"
                                    v-model="form.label"
                                />

                                <InputError
                                    class="mt-2"
                                    :message="form.errors.label"
                                />
                            </div>
                            <div>
                                <input
                                    class="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] text-base font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-blue-300 focus:bg-blue-400 focus:shadow-te-primary focus:outline-none dark:border-neutral-600"
                                    type="file"
                                    id="formFileMultiple"
                                    @input="form.url = $event.target.files[0]"
                                />
                                <InputError
                                    class="mt-2"
                                    :message="form.errors.url"
                                />
                            </div>
                            <div>
                                <progress
                                    v-if="form.progress"
                                    :value="form.progress.percentage"
                                    max="100"
                                >
                                    {{ form.progress.percentage }}%
                                </progress>
                            </div>

                            <div class="flex items-center gap-4">
                                <PrimaryButton
                                    :class="{ 'opacity-25': form.processing }"
                                    :disabled="form.processing"
                                    >Import</PrimaryButton
                                >
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
