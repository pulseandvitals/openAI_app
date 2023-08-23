<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

defineProps({
    datas: Array,
    file_name: String,
});
</script>

<template>
    <Head :title="file_name" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ file_name }}
            </h2>
        </template>
        <div class="py-6">
            <div class="max-w-12xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <div class="bg-white overflow-hidden mb-3">
                        <div class="px-6 py-4 border-b flex justify-end">
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

                    <div class="grid grid-cols-5 gap-5">
                        <div class="p-4 bg-blue-200">
                            <div class="text-center">
                                Main Topic (Pillar Silos)
                            </div>
                        </div>
                        <div class="p-4 bg-blue-200">
                            <div class="text-center">
                                Sub Topic 2 (Pillar Hubs)
                            </div>
                        </div>
                        <div class="p-4 bg-blue-200">
                            <div class="text-center">
                                Sub Topic 3 (Clusters)
                            </div>
                        </div>
                        <div class="p-4 bg-blue-200">
                            <div class="text-center">
                                Sub Topic 4 (Individual Page)
                            </div>
                        </div>
                        <div class="p-4 bg-blue-200">
                            <div class="text-center">Keywords</div>
                        </div>

                        <div class="font-bold">
                            <div
                                class="p-4 bg-white self-start mt-2 flex justify-between"
                                v-for="e in datas.main_topic_1"
                                :key="e.id"
                            >
                                <span
                                    :class="[
                                        e.main_topic_1 ? 'text-green-500' : '',
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
                                class="p-4 bg-white self-start mt-2 flex justify-between"
                                v-for="e in datas.sub_topic_2.data"
                                :key="e.id"
                            >
                                <span
                                    :class="[
                                        datas.sub_topic_2.value == e.sub_topic_2
                                            ? 'text-green-500'
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
                                class="p-4 bg-white self-start mt-2 flex justify-between"
                                v-for="e in datas.sub_topic_3.data"
                                :key="e.id"
                            >
                                <span
                                    :class="[
                                        datas.sub_topic_3.value == e.sub_topic_3
                                            ? 'text-green-500'
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
                                class="p-4 bg-white self-start mt-2"
                                v-for="e in datas.sub_topic_4.data"
                                :key="e.id"
                            >
                                <span>
                                    {{ e.sub_topic_4 }}
                                    <Link
                                        href=""
                                        class="text-xs text-gray-300"
                                        preserve-scroll
                                    >
                                        Edit
                                    </Link>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
