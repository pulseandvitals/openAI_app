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
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <div class="bg-white overflow-hidden mb-3">
                        <div class="px-6 py-4 border-b flex justify-end">
                            <Link
                                :href="route('document.create')"
                                class="px-4 py-2 text-black border border-none font-bold"
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
                                        d="M12 4.5v15m7.5-7.5h-15"
                                    />
                                </svg>
                            </Link>
                        </div>
                    </div>

                    <div class="grid grid-cols-4 gap-4">
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
                        <div class="p-4 bg-white self-start">
                            <div
                                class="font-bold"
                                v-for="e in datas.main_topic_1"
                                :key="e.id"
                            >
                                <span> [ {{ e.main_topic_1 }} ] </span>
                            </div>
                        </div>
                        <div class="p-4 bg-white self-start">
                            <div
                                class="font-bold"
                                v-for="e in datas.sub_topic_2"
                                :key="e.id"
                            >
                                <span> [ {{ e.sub_topic_2 }} ] </span>
                            </div>
                        </div>
                        <div class="p-4 bg-white self-start">
                            <div
                                class="font-bold"
                                v-for="e in datas.sub_topic_3"
                                :key="e.id"
                            >
                                <span> [ {{ e.sub_topic_3 }} ] </span>
                            </div>
                        </div>
                        <div class="p-4 bg-white self-start">
                            <div
                                class="font-bold"
                                v-for="e in datas.sub_topic_4"
                                :key="e.id"
                            >
                                <span> [ {{ e.sub_topic_4 }} ] </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
