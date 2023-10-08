<script setup>
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import ModalRight from "@/Components/ModalRight.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import { nextTick, ref } from "vue";

let props = defineProps({
    header: String,
});

const ModalHeading = ref(false);

const closeModal = () => {
    ModalHeading.value = false;
    form.reset();
};

const HeadingModal = () => {
    ModalHeading.value = true;
};
</script>
<template>
    <section>
        <PrimaryButton @click="HeadingModal"> Selected Headings </PrimaryButton>

        <ModalRight :show="ModalHeading" @close="closeModal">
            <div class="bg-white mb-3 rounded-lg">
                <div class="px-3 py-4">
                    <div class="mb-5">
                        <span class="font-bold"> Selected Headings </span>
                    </div>
                    <div class="bg-white mb-3 rounded-lg self-start">
                        <div
                            class="bg-gray-100 border-l-4 border-orange-500 text-gray-500 p-4 mb-2 rounded-lg flex justify-between items-center"
                        >
                            <div>
                                <p class="font-bold">H2 Sample headings</p>
                            </div>
                            <div class="text-gray-500">
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
                                            d="M6 18L18 6M6 6l12 12"
                                        />
                                    </svg>
                                </Link>
                            </div>
                        </div>
                        <div
                            class="bg-gray-100 border-l-4 border-orange-500 text-gray-500 p-4 mb-2 rounded-lg flex justify-between items-center"
                        >
                            <div>
                                <p class="font-bold">H2 Sample headings</p>
                            </div>
                            <div class="text-gray-500">
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
                                            d="M6 18L18 6M6 6l12 12"
                                        />
                                    </svg>
                                </Link>
                            </div>
                        </div>
                        <div
                            class="bg-gray-100 border-l-4 border-orange-500 text-gray-500 p-4 mb-2 rounded-lg flex justify-between items-center"
                        >
                            <div>
                                <p class="font-bold">H2 Sample headings</p>
                            </div>
                            <div class="text-gray-500">
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
                                            d="M6 18L18 6M6 6l12 12"
                                        />
                                    </svg>
                                </Link>
                            </div>
                        </div>
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
            </div>
        </ModalRight>
    </section>
</template>
