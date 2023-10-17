<script setup>
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import ModalRight from "@/Components/ModalRight.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import { nextTick, ref } from "vue";

let props = defineProps({
    selectedHeading: Array,
});
</script>
<template>
    <aside
        id="sidebar-multi-level-sidebar"
        class="fixed top-0 right-0 z-40 w-80 h-screen transition-transform -translate-x-full sm:translate-x-0 border-4 rounded-lg"
        aria-label="Sidebar"
    >
        <div class="h-full px-3 py-4 overflow-y-auto bg-white shadow-sm">
            <div class="">
                <div class="mb-5">
                    <span class="font-bold"> Selected Headings </span>
                </div>
                <div
                    class="text-gray-500 font-medium hover:text-gray-800 mb-5 flex justify-between"
                >
                    <button
                        class="bg-white text-gray-700 hover:bg-gray-200 active:bg-gray-400 border-solid border-2 border-gray-300 py-2 px-2 rounded-lg"
                    >
                        Generate AI outline
                    </button>
                    <button
                        class="bg-white text-gray-700 hover:bg-gray-200 active:bg-gray-400 border-solid border-2 border-gray-300 py-2 px-2 rounded-lg"
                    >
                        Copy
                    </button>
                </div>
            </div>
            <hr
                class="w-48 h-1 mx-auto my-4 bg-gray-100 border-0 rounded dark:bg-gray-300"
            />
            <div
                class="bg-white mb-3 rounded-lg self-start"
                v-for="selected in selectedHeading"
                :key="selected.id"
            >
                <div
                    class="bg-gray-100 border-l-4 border-orange-500 text-gray-500 p-4 mb-2 rounded-lg flex justify-between items-center"
                >
                    <div class="flex items-center">
                        <p
                            class="bg-orange-100 text-xs font-medium mr-2 px-2.5 rounded dark:text-orange-400 border border-orange-400"
                        >
                            H2
                        </p>
                        <span class="font-medium"> {{ selected }}</span>
                    </div>

                    <div class="text-gray-500 flex items-center">
                        <Link
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
                                    d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                />
                            </svg>
                        </Link>
                    </div>
                </div>
            </div>
            <div class="flex items-center" v-if="selectedHeading.length == 0">
                <span class="font-bold text-gray-500 mb-2 mx-auto">
                    Empty please select headings
                </span>
            </div>

            <div class="flex justify-between items-center">
                <select id="small" class="rounded mr-2 border border-gray-300">
                    <option selected></option>
                    <option value="h1">H1</option>
                    <option value="h2">H2</option>
                    <option value="h3">H3</option>
                    <option value="h4">H4</option>
                    <option value="h5">H5</option>
                    <option value="h6">H6</option>
                </select>
                <TextInput
                    type="text"
                    class="w-full mr-2 rounded border-gray-200"
                >
                </TextInput>
                <Link
                    class="bg-white hover:bg-gray-200 active:bg-gray-800 border-0"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="w-6 h-6 text-gray-400"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"
                        />
                    </svg>
                </Link>
            </div>

            <div class="flex justify-center">
                <Link
                    :href="route('document.content-brief.create')"
                    class="absolute bottom-2 px-4 inline-flex items-center py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-600 focus:bg-blue-700 active:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                >
                    Proceed to Content Brief
                </Link>
            </div>
        </div>
    </aside>
</template>
