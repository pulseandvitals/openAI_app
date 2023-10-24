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
    heading_id: props.headingData.id,
    additional_information: "",
});
const AddInformationModalValue = ref(false);

const closeModal = () => {
    AddInformationModalValue.value = false;
    form.reset();
};

const AddInformationModal = () => {
    AddInformationModalValue.value = true;
};

const submit = () => {
    form.post(route("document.content-brief.store"), {
        preserveScroll: true,
        onSuccess: () => closeModal(),
    });
};
</script>
<template>
    <button @click="AddInformationModal" class="font-xs text-gray-500 mr-2">
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
                d="M12 4.5v15m7.5-7.5h-15"
            />
        </svg>
    </button>
    <Modal :show="AddInformationModalValue" @close="closeModal">
        <form class="mt-6 space-y-6" @submit.prevent="submit">
            <div class="p-6">
                <h2 class="text-lg font-medium text-gray-900">
                    Additional information
                </h2>
                <textarea
                    type="text"
                    rows="3"
                    class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                    v-model="form.additional_information"
                />
                <InputError
                    class="mt-2"
                    :message="form.errors.additional_information"
                />

                <div class="mt-6 flex justify-end">
                    <SecondaryButton @click="closeModal">
                        Cancel
                    </SecondaryButton>

                    <PrimaryButton
                        class="ml-3"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                    >
                        Add
                    </PrimaryButton>
                </div>
            </div>
        </form></Modal
    >
</template>
