<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import ContentOverview from "./Partials/ContentOverview.vue";
import ModalEditKeyword from "./Partials/ModalEditKeyword.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import Success from "@/Components/Alert/Success.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import { ref } from "vue";

defineProps({
    datas: Object,
    file_name: String,
});

const checked = ref([]);
const form = useForm({});

const destroy = (keyword) => {
    form.delete(route("document.article.destroy", { keyword: keyword }), {
        onBefore: () =>
            confirm("Are you sure you want to delete this keyword?"),
        preserveScroll: true,
    });
};
const generateArticle = (keywords) => {
    form.post(
        route("document.article.generate-article", { keywords: keywords }),
        {
            onBefore: () =>
                confirm("Are you sure you want to generate this keywords?"),
            preserveScroll: true,
        }
    );
};
</script>

<template>
    <Head :title="file_name" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ file_name }}
            </h2>
        </template>

        <ContentOverview :counts="datas.counts" :file_name="file_name" />

        <Success />

        <div class="py-3 ml-8">
            <div class="max-w-12xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <div class="bg-white overflow-hidden mb-3 rounded-lg">
                        <div class="px-6 py-4 flex justify-between">
                            <div class="flex items-center">
                                <TextInput class="block mr-2" />
                                <PrimaryButton
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
                                            d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"
                                        />
                                    </svg>
                                </PrimaryButton>
                            </div>
                            <div class="flex items-center">
                                <Link
                                    :href="route('document.create')"
                                    class="px-4 py-2 border border-none rounded-lg font-bold hover:shadow-lg mr-2"
                                    title="Export file"
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
                                            d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5"
                                        />
                                    </svg>
                                </Link>
                                <PrimaryButton
                                    @click="generateArticle(checked)"
                                    :class="{
                                        'opacity-25': checked.length == 0,
                                    }"
                                    :disabled="checked.length == 0"
                                    >Generate Articles</PrimaryButton
                                >
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-5 gap-5">
                        <div class="p-4 bg-blue-200 rounded-lg">
                            <div class="text-center">
                                Main Topic (Pillar Silos)
                            </div>
                        </div>
                        <div class="p-4 bg-blue-200 rounded-lg">
                            <div class="text-center">
                                Sub Topic 2 (Pillar Hubs)
                            </div>
                        </div>
                        <div class="p-4 bg-blue-200 rounded-lg">
                            <div class="text-center">
                                Sub Topic 3 (Clusters)
                            </div>
                        </div>
                        <div class="p-4 bg-blue-200 rounded-lg">
                            <div class="text-center">Sub Topic 4</div>
                        </div>
                        <div class="p-4 bg-blue-200 rounded-lg">
                            <div class="text-center">Keywords</div>
                        </div>

                        <div class="font-bold">
                            <div
                                class="p-4 bg-white self-start mt-2 text-gray-400 flex justify-between rounded-lg hover:bg-gray-50 active:bg-gray-100"
                                v-for="e in datas.main_topic_1"
                                :key="e.id"
                            >
                                <span
                                    :class="[
                                        e.main_topic_1 ? 'text-blue-500' : '',
                                    ]"
                                >
                                    {{ e.main_topic_1 }}
                                </span>
                                <Link
                                    :href="
                                        route('document.show', {
                                            parent: e.main_topic_1,
                                            child: e.main_topic_1,
                                            document: e.document_id,
                                        })
                                    "
                                    preserve-scroll
                                    class="text-xs text-gray-300"
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
                                            d="M11.25 4.5l7.5 7.5-7.5 7.5m-6-15l7.5 7.5-7.5 7.5"
                                        />
                                    </svg>
                                </Link>
                            </div>
                        </div>
                        <div class="font-bold">
                            <div
                                class="p-4 bg-white self-start mt-2 text-gray-400 flex justify-between rounded-lg hover:bg-gray-50 active:bg-gray-100"
                                v-for="e in datas.sub_topic_2.data"
                                :key="e.id"
                            >
                                <span
                                    :class="[
                                        datas.sub_topic_2.value == e.sub_topic_2
                                            ? 'text-blue-500'
                                            : '',
                                    ]"
                                >
                                    {{ e.sub_topic_2 }}
                                </span>

                                <Link
                                    :href="
                                        route('document.show', {
                                            parent: e.sub_topic_2,
                                            child: e.sub_topic_2,
                                            document: e.document_id,
                                        })
                                    "
                                    preserve-scroll
                                    class="text-xs text-gray-300"
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
                                            d="M11.25 4.5l7.5 7.5-7.5 7.5m-6-15l7.5 7.5-7.5 7.5"
                                        />
                                    </svg>
                                </Link>
                            </div>
                        </div>
                        <div class="font-bold">
                            <div
                                class="p-4 bg-white self-start mt-2 text-gray-400 flex justify-between rounded-lg hover:bg-gray-50 active:bg-gray-100"
                                v-for="e in datas.sub_topic_3.data"
                                :key="e.id"
                            >
                                <span
                                    :class="[
                                        datas.sub_topic_3.value == e.sub_topic_3
                                            ? 'text-blue-500'
                                            : '',
                                    ]"
                                >
                                    {{ e.sub_topic_3 }}
                                </span>

                                <Link
                                    href=""
                                    class="text-xs text-gray-300"
                                    preserve-scroll
                                >
                                    <Link
                                        :href="
                                            route('document.show', {
                                                parent: e.sub_topic_2,
                                                child: e.sub_topic_3,
                                                document: e.document_id,
                                            })
                                        "
                                        preserve-scroll
                                        class="text-xs text-gray-300"
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
                                                d="M11.25 4.5l7.5 7.5-7.5 7.5m-6-15l7.5 7.5-7.5 7.5"
                                            />
                                        </svg>
                                    </Link>
                                </Link>
                            </div>
                        </div>

                        <div class="font-bold">
                            <div
                                class="p-4 bg-white self-start mt-2 text-gray-400 flex justify-between rounded-lg hover:bg-gray-50 active:bg-gray-100 items-center"
                                v-for="e in datas.sub_topic_4.data"
                                :key="e.id"
                            >
                                <span>
                                    {{ e.sub_topic_4 }}
                                </span>
                                <Link
                                    class="text-gray-300"
                                    :href="
                                        route('document.heading.show', {
                                            keyword: e.sub_topic_4,
                                        })
                                    "
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
                                            d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"
                                        />
                                    </svg>
                                </Link>
                            </div>
                        </div>

                        <div class="font-bold">
                            <div
                                class="p-4 self-start mt-2 text-gray-400 rounded-lg flex justify-between"
                                v-for="e in datas.keywords.data"
                                :key="e.id"
                                :class="[
                                    e.is_article_completed
                                        ? 'bg-green-200 text-green-500'
                                        : 'bg-white',
                                ]"
                            >
                                <div class="flex items-center">
                                    <input
                                        type="checkbox"
                                        v-model="checked"
                                        :value="e.id"
                                        class="mr-2"
                                        v-if="!e.is_completed"
                                    />
                                    <span>
                                        {{ e.keyword }}
                                    </span>
                                </div>
                                <div class="align items-end">
                                    <ModalEditKeyword :keyword="e" />
                                    <Link
                                        class="text-gray-300"
                                        :href="
                                            route('document.article.show', {
                                                keyword: e,
                                            })
                                        "
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
                                                d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"
                                            />
                                        </svg>
                                    </Link>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
