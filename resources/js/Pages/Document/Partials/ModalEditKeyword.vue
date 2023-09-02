<script setup>
import { nextTick, ref } from "vue";
import Modal from "@/Components/Modal.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
    keyword: Object,
});
useForm({
    url: props.keyword.url,
    position: props.keyword.position,
    status: props.keyword.status,
    main_topic_1: props.keyword.main_topic_1,
    sub_topic_2: props.main_topic_2,
    sub_topic_3: props.main_topic_3,
    sub_topic_4: props.main_topic_4,
    keyword: props.keyword.keyword,
    seo_title: props.keyword.seo_title,
    serp_analysis: props.keyword.serp_analysis,
    search_content: props.keyword.search_content,
    content_type: props.keyword.content_type,
    search_volume: props.keyword.search_volume,
    cpc: props.keyword.cpc,
});
const ModalKeyword = ref(false);
const closeModal = () => {
    alert("niabot");
    ModalKeyword.value = false;

    form.reset();
};
const editKeywordModal = () => {
    alert("niabot");
    ModalKeyword.value = true;

    nextTick(() => passwordInput.value.focus());
};
</script>
<template>
    <Modal :show="EditKeyword" @close="closeModal">
        <div class="p-6">
            <h2 class="text-lg font-medium text-gray-900">
                Are you sure you want to delete your account?
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                Once your account is deleted, all of its resources and data will
                be permanently deleted. Please enter your password to confirm
                you would like to permanently delete your account.
            </p>

            <div class="mt-6">
                <InputLabel for="Url" value="Url" class="sr-only" />

                <TextInput
                    id="url"
                    ref="url"
                    v-model="form.url"
                    type="text"
                    class="mt-1 block w-3/4"
                />

                <InputError :message="form.errors.url" class="mt-2" />
            </div>

            <div class="mt-6">
                <InputLabel for="Position" value="Position" class="sr-only" />

                <TextInput
                    id="position"
                    ref="position"
                    v-model="form.position"
                    type="text"
                    class="mt-1 block w-3/4"
                />

                <InputError :message="form.errors.position" class="mt-2" />
            </div>

            <div class="mt-6">
                <InputLabel for="Status" value="Status" class="sr-only" />

                <TextInput
                    id="status"
                    ref="status"
                    v-model="form.status"
                    type="text"
                    class="mt-1 block w-3/4"
                />

                <InputError :message="form.errors.status" class="mt-2" />
            </div>

            <div class="mt-6">
                <InputLabel
                    for="Main Topic 1"
                    value="Main Topic 1"
                    class="sr-only"
                />

                <TextInput
                    id="main_topic_1"
                    ref="main_topic_1"
                    v-model="form.main_topic_1"
                    type="text"
                    class="mt-1 block w-3/4"
                />

                <InputError :message="form.errors.main_topic_1" class="mt-2" />
            </div>

            <div class="mt-6">
                <InputLabel
                    for="Sub Topic 2"
                    value="Sub Topic 2"
                    class="sr-only"
                />

                <TextInput
                    id="sub_topic_2"
                    ref="sub_topic_2"
                    v-model="form.sub_topic_2"
                    type="text"
                    class="mt-1 block w-3/4"
                />

                <InputError :message="form.errors.sub_topic_2" class="mt-2" />
            </div>

            <div class="mt-6">
                <InputLabel
                    for="Sub Topic 3"
                    value="Sub Topic 3"
                    class="sr-only"
                />

                <TextInput
                    id="sub_topic_3"
                    ref="sub_topic_3"
                    v-model="form.sub_topic_3"
                    type="text"
                    class="mt-1 block w-3/4"
                />

                <InputError :message="form.errors.sub_topic_3" class="mt-2" />
            </div>

            <div class="mt-6">
                <InputLabel
                    for="Sub Topic 4"
                    value="Sub Topic 4"
                    class="sr-only"
                />

                <TextInput
                    id="sub_topic_4"
                    ref="sub_topic_4"
                    v-model="form.sub_topic_4"
                    type="text"
                    class="mt-1 block w-3/4"
                />

                <InputError :message="form.errors.sub_topic_4" class="mt-2" />
            </div>

            <div class="mt-6">
                <InputLabel for="Keyword" value="Keyword" class="sr-only" />

                <TextInput
                    id="keyword"
                    ref="keyword"
                    v-model="form.keyword"
                    type="text"
                    class="mt-1 block w-3/4"
                />

                <InputError :message="form.errors.keyword" class="mt-2" />
            </div>

            <div class="mt-6">
                <InputLabel for="SEO title" value="SEO Title" class="sr-only" />

                <TextInput
                    id="seo_title"
                    ref="seo_title"
                    v-model="form.seo_title"
                    type="text"
                    class="mt-1 block w-3/4"
                />

                <InputError :message="form.errors.seo_title" class="mt-2" />
            </div>

            <div class="mt-6">
                <InputLabel
                    for="SERP Analysis"
                    value="SERP Analysis"
                    class="sr-only"
                />

                <TextInput
                    id="serp_analysis"
                    ref="serp_analysis"
                    v-model="form.serp_analysis"
                    type="text"
                    class="mt-1 block w-3/4"
                />

                <InputError :message="form.errors.serp_analysis" class="mt-2" />
            </div>

            <div class="mt-6">
                <InputLabel
                    for="Search Content"
                    value="Search Content"
                    class="sr-only"
                />

                <TextInput
                    id="search_content"
                    ref="search_content"
                    v-model="form.search_content"
                    type="text"
                    class="mt-1 block w-3/4"
                />

                <InputError
                    :message="form.errors.search_content"
                    class="mt-2"
                />
            </div>

            <div class="mt-6">
                <InputLabel
                    for="Content Type"
                    value="Content Type"
                    class="sr-only"
                />

                <TextInput
                    id="content_type"
                    ref="content_type"
                    v-model="form.content_type"
                    type="text"
                    class="mt-1 block w-3/4"
                />

                <InputError :message="form.errors.content_type" class="mt-2" />
            </div>

            <div class="mt-6">
                <InputLabel
                    for="Search Content"
                    value="Search Content"
                    class="sr-only"
                />

                <TextInput
                    id="search_content"
                    ref="search_content"
                    v-model="form.search_content"
                    type="text"
                    class="mt-1 block w-3/4"
                />

                <InputError
                    :message="form.errors.search_content"
                    class="mt-2"
                />
            </div>

            <div class="mt-6">
                <InputLabel
                    for="Search Volume"
                    value="Search Volume"
                    class="sr-only"
                />

                <TextInput
                    id="search_volume"
                    ref="search_volume"
                    v-model="form.search_volume"
                    type="text"
                    class="mt-1 block w-3/4"
                />

                <InputError :message="form.errors.search_volume" class="mt-2" />
            </div>

            <div class="mt-6">
                <InputLabel for="CPC" value="CPC" class="sr-only" />

                <TextInput
                    id="cpc"
                    ref="cpc"
                    v-model="form.cpc"
                    type="text"
                    class="mt-1 block w-3/4"
                />

                <InputError :message="form.errors.cpc" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <SecondaryButton @click="closeModal"> Cancel </SecondaryButton>

                <PrimaryButton
                    class="ml-3"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Update
                </PrimaryButton>
            </div>
        </div>
    </Modal>
</template>
