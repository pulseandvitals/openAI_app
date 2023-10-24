<script setup>
import PrimaryButton from "@/Components/PrimaryButton.vue";
import Modal from "@/Components/Modal.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";
import { nextTick, ref } from "vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

let props = defineProps({
    headingData: Object,
});
let form = useForm({
    heading_type: props.headingData.heading_type,
    heading_title: props.headingData.heading_title,
});
const EditContentModalValue = ref(false);

const closeModal = () => {
    EditContentModalValue.value = false;
    form.reset();
};

const EditContentModal = () => {
    EditContentModalValue.value = true;
};
</script>
<template>
    <button @click="EditContentModal" class="font-xs text-gray-500 mr-2">
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
                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"
            />
        </svg>
    </button>
    <Modal :show="EditContentModalValue" @close="closeModal">
        <form
            class="mt-6 space-y-6"
            @submit.prevent="
                form.patch(
                    route('document.content-brief.update', headingData),
                    {
                        preserveScroll: true,
                        onSuccess: () => closeModal(),
                    }
                )
            "
        >
            <div class="p-6">
                <h2 class="text-lg font-medium text-gray-900">
                    Edit heading information.
                </h2>
                <div class="mt-6">
                    <div class="flex justify-start">
                        <select
                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block mr-2"
                            v-model="form.heading_type"
                        >
                            <option value="h1">H1</option>
                            <option value="h2">H2</option>
                            <option value="h3">H3</option>
                            <option value="h4">H4</option>
                            <option value="h5">H5</option>
                            <option value="h6">H6</option>
                        </select>
                        <InputError
                            class="mt-2"
                            :message="form.errors.heading_type"
                        />

                        <TextInput
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.heading_title"
                        />

                        <InputError
                            class="mt-2"
                            :message="form.errors.heading_title"
                        />
                    </div>
                </div>

                <div class="mt-6 flex justify-end">
                    <SecondaryButton @click="closeModal">
                        Cancel
                    </SecondaryButton>

                    <PrimaryButton
                        class="ml-3"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                    >
                        Update
                    </PrimaryButton>
                </div>
            </div>
        </form></Modal
    >
</template>
