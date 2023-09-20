<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import DangerButton from "@/Components/DangerButton.vue";
import Success from "@/Components/Alert/Success.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

let props = defineProps({
    article: Object,
    prompt: Object,
    related_info: Object,
});
let form = useForm({
    keyword: props.article.keyword,
    additional_info: props.related_info,
    options: "",
    outline_format: "",
    prompt: props.prompt.response,
});
const destroy = (prompt) => {
    form.delete(route("document.article.destroy", prompt), {
        onBefore: () =>
            confirm("Are you sure you want to delete this article?"),
        preserveScroll: true,
        preserveState: false,
    });
};

const submitArticle = (prompt) => {
    form.patch(route("document.article.submit-article", prompt), {
        onBefore: () =>
            confirm("Are you sure you want to submit this article?"),
        preserveScroll: true,
        preserveState: false,
    });
};

const generateSingleArticle = (article) => {
    form.post(
        route("document.article.generate-single-article", {
            article: article,
        }),
        {
            onBefore: () =>
                confirm("Are you sure you want to generate these details?"),
            preserveScroll: true,
            preserveState: false,
        }
    );
};
</script>

<template>
    <Head :title="article.keyword" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ article.keyword }}
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
                                <option value=""></option>
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
                                <option value=""></option>
                                <option value="bullet">Bullet Format</option>
                                <option value="html">HTML Format</option>
                                <option value="numbering">Number Format</option>
                            </select>
                            <span class="text-gray-300 text-xs">
                                Please note that these fields are Optional.
                            </span>
                        </div>
                    </div>

                    <div class="bg-white mb-3 rounded-lg">
                        <div class="px-6 py-4">
                            <div class="flex justify-between mb-2">
                                <InputLabel for="keyword" value="AI Prompt" />
                                <Link @click="destroy(prompt.id)">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                        class="w-6 h-6 text-red-500"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
                                        />
                                    </svg>
                                </Link>
                            </div>
                            <textarea
                                type="text"
                                rows="10"
                                class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                v-model="form.prompt"
                            />
                            <div class="flex justify-between mb-2">
                                <span class="text-gray-300 text-xs">
                                    Please note that this section generates the
                                    result of all the content you've provided to
                                    AI. (Click generate when done providing all
                                    the details.)
                                </span>
                                <span class="text-gray-500 text-xs">{{
                                    prompt.created
                                }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="py-3 px-3">
                        <PrimaryButton
                            @click="generateSingleArticle(article)"
                            :class="{
                                'opacity-25': form.prompt,
                            }"
                            :disabled="form.prompt"
                        >
                            Generate
                        </PrimaryButton>
                        <PrimaryButton
                            @click="submitArticle(prompt)"
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
