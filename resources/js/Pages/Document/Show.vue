<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import ContentOverview from "./Partials/ContentOverview.vue";
import Success from "@/Components/Alert/Success.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import ModalEditKeyword from "./Partials/ModalEditKeyword.vue";

defineProps({
    datas: Object,
    file_name: String,
});

const form = useForm({});
const destroy = (keyword) => {
    form.delete(route("document.article.destroy", { keyword: keyword }), {
        onBefore: () =>
            confirm("Are you sure you want to delete this keyword?"),
        preserveScroll: true,
    });
};
const generateArticle = (keyword) => {
    form.post(
        route("document.article.generate-article", { keyword: keyword }),
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

        <ContentOverview :counts="datas.counts" />

        <Success />

        <div class="py-3 ml-8">
            <div class="max-w-12xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <div class="bg-white overflow-hidden mb-3 rounded-lg">
                        <div class="px-6 py-4 border-b flex justify-between">
                            <div class="text-gray-600 font-extrabold text-2xl">
                                {{ file_name }}
                            </div>
                            <Link
                                :href="route('document.create')"
                                class="px-4 py-2 border border-none rounded-lg font-bold hover:shadow-lg"
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
                        </div>
                    </div>

                    <div class="grid grid-cols-4 gap-5">
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
                            <div class="text-center">Keywords</div>
                        </div>

                        <div class="font-bold">
                            <div
                                class="p-4 bg-white self-start mt-2 flex justify-between rounded-lg"
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
                                class="p-4 bg-white self-start mt-2 flex justify-between rounded-lg"
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
                                class="p-4 bg-white self-start mt-2 flex justify-between rounded-lg"
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
                                class="p-4 self-start mt-2 rounded-lg flex justify-between"
                                v-for="e in datas.keywords.data"
                                :key="e.id"
                                :class="[
                                    e.is_completed
                                        ? 'bg-green-200 text-green-500'
                                        : 'bg-white',
                                ]"
                            >
                                <span>
                                    {{ e.keyword }}
                                </span>
                                <div class="items-center">
                                    <button
                                        @click="generateArticle(e)"
                                        class="font-xs text-gray-300 mr-2"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke-width="1.5"
                                            stroke="currentColor"
                                            class="w-6 h-6 text-yellow-400"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z"
                                            />
                                        </svg>
                                    </button>

                                    <ModalEditKeyword :keyword="e" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
