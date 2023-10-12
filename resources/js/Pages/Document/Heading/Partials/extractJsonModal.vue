<script setup>
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import Modal from "@/Components/Modal.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import { nextTick, ref } from "vue";
import InputError from "@/Components/InputError.vue";

let form = useForm({
    url: "",
});
const extractJsonModal = ref(false);

const closeModal = () => {
    extractJsonModal.value = false;
    form.reset();
};

const extractJson = () => {
    extractJsonModal.value = true;
};
</script>
<template>
    <button @click="extractJson" class="font-xs text-gray-300 mr-2">
        Extract
    </button>
    <Modal :show="extractJsonModal" @close="closeModal">
        <form
            class="mt-6 space-y-6"
            enctype="multipart/form-data"
            @submit.prevent="
                form.post(route('document.heading.extract-json-file'))
            "
        >
            <div class="p-6 px-6">
                <span class="font-bold"> Extract Json File </span>
                <div>
                    <input
                        class="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] text-base font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-blue-300 focus:bg-blue-400 focus:shadow-te-primary focus:outline-none dark:border-neutral-600 mb-5"
                        type="file"
                        id="formFileMultiple"
                        @input="form.url = $event.target.files[0]"
                    />
                    <InputError class="mt-2" :message="form.errors.url" />
                </div>

                <div class="flex items-center gap-4">
                    <PrimaryButton
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                        >Import</PrimaryButton
                    >
                </div>
            </div>
        </form></Modal
    >
</template>
