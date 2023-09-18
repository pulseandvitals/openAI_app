<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import Success from "@/Components/Alert/Success.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

let props = defineProps({
    article: Object,
});
let form = useForm({
    keyword: props.article.keyword,
    additional_info: "",
    options: "",
    outline_format: "",
    include_heading: "heading",
    include_byline: "byline",
    include_body: "body",
    prompt: "",
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
                <div class="grid grid-cols-2 gap-5"></div>
                <div class="overflow-hidden">
                    <div class="bg-white mb-3 rounded-lg">
                        <div class="px-6 py-4">
                            <InputLabel for="keyword" value="Keyword" />
                            <TextInput
                                class="mt-1 block w-full"
                                type="text"
                                v-model="form.keyword"
                            />
                            <span class="text-gray-300 text-xs">
                                Heres the main keyword for generating article.
                                (Editable)
                            </span>
                        </div>
                    </div>

                    <div class="bg-white mb-3 rounded-lg">
                        <div class="px-6 py-4">
                            <InputLabel
                                for="keyword"
                                value="Additional details to support your Keyword"
                            />
                            <TextInput
                                class="mt-1 block w-full"
                                type="text"
                                v-model="form.additional_info"
                            />
                            <span class="text-gray-300 text-xs">
                                Please note that this field works separated with
                                comma or "," (Eg: Chair,Table)
                            </span>
                        </div>
                    </div>

                    <div class="bg-white mb-3 rounded-lg">
                        <div class="px-6 py-4">
                            <InputLabel
                                for="options"
                                value="Options"
                                class="mt-1"
                            />

                            <select
                                v-model="form.options"
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                            >
                                <option value="singular">Singular</option>
                                <option value="plural">Plural</option>
                            </select>
                            <InputLabel
                                for="type"
                                value="Outline Format"
                                class="mt-1"
                            />
                            <select
                                v-model="form.outline_format"
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                            >
                                <option value="bullet">Bullet Form</option>
                                <option value="numbering">Numbering</option>
                            </select>
                            <InputLabel
                                for="type"
                                value="Includes"
                                class="mt-1"
                            />
                            <div class="flex items-center">
                                <TextInput
                                    class="mt-1 mr-1"
                                    type="checkbox"
                                    checked="true"
                                    v-model="form.include_heading"
                                />
                                <span class="text-gray-400 mt-1 mr-3"
                                    >Heading</span
                                >
                                <TextInput
                                    class="mt-1 mr-1"
                                    type="checkbox"
                                    checked="true"
                                    v-model="form.include_byline"
                                />
                                <span class="text-gray-400 mt-1 mr-3"
                                    >Byline</span
                                >
                                <TextInput
                                    class="mt-1 mr-1"
                                    type="checkbox"
                                    checked="true"
                                    v-model="form.include_body"
                                />
                                <span class="text-gray-400 mt-1 mr-3"
                                    >Body</span
                                >
                            </div>
                            <span class="text-gray-300 text-xs">
                                Please note that these fields are Optional.
                            </span>
                        </div>
                    </div>

                    <div class="bg-white mb-3 rounded-lg">
                        <div class="px-6 py-4">
                            <InputLabel for="keyword" value="Prompt" />
                            <textarea
                                type="text"
                                rows="6"
                                class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                v-model="form.prompt"
                            />

                            <span class="text-gray-300 text-xs">
                                Please note that this section generates the
                                result of all the content you've provided to AI.
                                (Click generate when done providing all the
                                details.)
                            </span>
                        </div>
                    </div>
                    <div class="py-3 px-3">
                        <PrimaryButton> Generate </PrimaryButton>
                        <PrimaryButton
                            class="ml-2 bg-green-500 hover:bg-green-600 focus:bg-green-700 active:bg-green-800"
                        >
                            Submit
                        </PrimaryButton>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
