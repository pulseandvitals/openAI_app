<script setup>
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import Success from "@/Components/Alert/Success.vue";

let props = defineProps({
    selectedHeading: Array,
    heading: Object,
});
let form = useForm({
    manualInputHeadingType: "",
    manualInputHeadingTitle: "",
});
let saveManualInput = () => {
    let data = {
        header_type: form.manualInputHeadingType,
        header_title: form.manualInputHeadingTitle,
    };
    props.selectedHeading = props.selectedHeading.push(data);
    (form.manualInputHeadingTitle = ""), (form.manualInputHeadingType = "");
};
let submit = () => {
    form.post(
        route("document.heading.store", {
            heading: props.heading,
            selected: JSON.stringify(props.selectedHeading),
            preserveScroll: true,
        })
    );
};
let submitButton = () => {
    form.post(
        route("document.heading.store-button", {
            heading: props.heading,
            selected: JSON.stringify(props.selectedHeading),
            preserveScroll: true,
        })
    );
};
</script>
<template>
    <aside
        id="sidebar-multi-level-sidebar"
        class="fixed top-0 right-0 z-40 w-80 h-screen transition-transform -translate-x-full sm:translate-x-0 border-4 rounded-lg"
        aria-label="Sidebar"
    >
        <div class="h-full px-3 py-4 overflow-y-auto bg-white shadow-sm">
            <div class="">
                <div class="mb-5 flex justify-between items-center">
                    <div>
                        <span class="font-bold">
                            Selected Headings ({{ selectedHeading.length }})
                        </span>
                    </div>
                    <div>
                        <PrimaryButton
                            @click.prevent="submit"
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                        >
                            Save
                        </PrimaryButton>
                        <Transition
                            enter-active-class="transition ease-in-out"
                            enter-from-class="opacity-0"
                            leave-active-class="transition ease-in-out"
                            leave-to-class="opacity-0"
                        >
                            <p
                                v-if="form.recentlySuccessful"
                                class="text-sm text-gray-600"
                            >
                                Saved.
                            </p>
                        </Transition>
                    </div>
                </div>

                <div
                    class="text-gray-500 font-medium hover:text-gray-800 mb-5 flex justify-between"
                >
                    <button
                        class="bg-white text-gray-700 hover:bg-gray-200 active:bg-gray-400 border-solid border-2 border-gray-300 py-2 px-2 rounded-lg"
                        :class="{ 'opacity-25': selectedHeading.length <= 5 }"
                        :disabled="selectedHeading.length <= 5"
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
                class="bg-white mb-3 rounded-lg"
                v-for="selected in selectedHeading"
                :key="selected.id"
            >
                <div
                    class="bg-gray-100 text-gray-500 p-4 mb-2 rounded-lg flex justify-between items-center"
                    :class="[
                        selected.header_type == 'h1'
                            ? 'border-l-4 border-orange-500'
                            : '',
                        selected.header_type == 'h2'
                            ? 'border-l-4 border-blue-500'
                            : '',
                        selected.header_type == 'h3'
                            ? 'border-l-4 border-purple-500'
                            : '',
                        selected.header_type == 'h4'
                            ? 'border-l-4 border-green-500'
                            : '',
                        selected.header_type == 'h5'
                            ? 'border-l-4 border-red-500'
                            : '',
                        selected.header_type == 'h6'
                            ? 'border-l-4 border-yellow-500'
                            : '',
                    ]"
                >
                    <div class="flex items-center">
                        <p
                            class="text-xs font-medium mr-2 px-2.5 rounded uppercase"
                            :class="[
                                selected.header_type == 'h1'
                                    ? 'dark:text-orange-400 border border-orange-400'
                                    : '',
                                selected.header_type == 'h2'
                                    ? 'dark:text-blue-400 border border-blue-400'
                                    : '',
                                selected.header_type == 'h3'
                                    ? 'dark:text-purple-400 border border-purple-400'
                                    : '',
                                selected.header_type == 'h4'
                                    ? 'dark:text-green-400 border border-green-400'
                                    : '',
                                selected.header_type == 'h5'
                                    ? 'dark:text-red-400 border border-red-400'
                                    : '',
                                selected.header_type == 'h6'
                                    ? 'dark:text-yellow-400 border border-yellow-400'
                                    : '',
                            ]"
                        >
                            {{ selected.header_type }}
                        </p>
                        <span class="text-xs">
                            {{ selected.header_title }}</span
                        >
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
                <select
                    id="small"
                    class="rounded mr-2 border border-gray-300"
                    v-model="form.manualInputHeadingType"
                >
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
                    v-model="form.manualInputHeadingTitle"
                >
                </TextInput>
                <PrimaryButton
                    class="bg-white hover:bg-gray-200 active:bg-gray-800 border-0"
                    @click="saveManualInput()"
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
                </PrimaryButton>
            </div>

            <div class="flex justify-center">
                <PrimaryButton
                    @click.prevent="submitButton"
                    class="absolute bottom-2 px-4 items-center py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase hover:bg-blue-600 focus:bg-blue-700 active:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                >
                    Proceed to Content Brief
                </PrimaryButton>
            </div>
        </div>
    </aside>
</template>
