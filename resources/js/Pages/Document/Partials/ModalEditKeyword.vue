<script setup>
import { nextTick, ref } from "vue";
import Modal from "@/Components/Modal.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
    keyword: Object,
});
const form = useForm({
    url: props.keyword.url,
    position: props.keyword.position,
    status: props.keyword.status,
    main_topic_1: props.keyword.main_topic_1,
    sub_topic_2: props.keyword.sub_topic_2,
    sub_topic_3: props.keyword.sub_topic_3,
    sub_topic_4: props.keyword.sub_topic_4,
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
    ModalKeyword.value = false;
    form.reset();
};
const editKeywordModal = () => {
    ModalKeyword.value = true;
};
function submit(keyword) {
    form.patch(route("document.update", { keyword: keyword }), {
        preserveScroll: true,
        preserveState: false,
        onSuccess: () => closeModal(),
    });
}
</script>
<template>
    <button @click="editKeywordModal" class="font-xs text-gray-300 mr-2">
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
    <Modal :show="ModalKeyword" @close="closeModal">
        <form @submit.prevent="submit(keyword)">
            <div class="p-6">
                <h2 class="text-lg font-medium text-gray-900">
                    Edit "{{ keyword.keyword }}" keyword.
                </h2>

                <div class="mt-6">
                    <InputLabel for="Url" value="Url" />

                    <TextInput
                        id="url"
                        ref="url"
                        v-model="form.url"
                        type="text"
                        class="mt-1 block w-full"
                    />

                    <InputError :message="form.errors.url" />
                </div>

                <div class="mt-6">
                    <InputLabel for="Position" value="Position" />

                    <TextInput
                        id="position"
                        ref="position"
                        v-model="form.position"
                        type="text"
                        class="mt-1 block w-full"
                    />

                    <InputError :message="form.errors.position" class="mt-2" />
                </div>

                <div class="mt-6">
                    <InputLabel for="status" value="Status" />

                    <TextInput
                        id="status"
                        ref="status"
                        v-model="form.status"
                        type="text"
                        class="mt-1 block w-full"
                    />

                    <InputError :message="form.errors.status" class="mt-2" />
                </div>

                <div class="mt-6">
                    <InputLabel for="Main Topic 1" value="Main Topic 1" />

                    <TextInput
                        id="main_topic_1"
                        ref="main_topic_1"
                        v-model="form.main_topic_1"
                        type="text"
                        class="mt-1 block w-full"
                    />

                    <InputError
                        :message="form.errors.main_topic_1"
                        class="mt-2"
                    />
                </div>

                <div class="mt-6">
                    <InputLabel for="Sub Topic 2" value="Sub Topic 2" />

                    <TextInput
                        id="sub_topic_2"
                        ref="sub_topic_2"
                        v-model="form.sub_topic_2"
                        type="text"
                        class="mt-1 block w-full"
                    />

                    <InputError
                        :message="form.errors.sub_topic_2"
                        class="mt-2"
                    />
                </div>

                <div class="mt-6">
                    <InputLabel for="Sub Topic 3" value="Sub Topic 3" />

                    <TextInput
                        id="sub_topic_3"
                        ref="sub_topic_3"
                        v-model="form.sub_topic_3"
                        type="text"
                        class="mt-1 block w-full"
                    />

                    <InputError
                        :message="form.errors.sub_topic_3"
                        class="mt-2"
                    />
                </div>

                <div class="mt-6">
                    <InputLabel for="Sub Topic 4" value="Sub Topic 4" />

                    <TextInput
                        id="sub_topic_4"
                        ref="sub_topic_4"
                        v-model="form.sub_topic_4"
                        type="text"
                        class="mt-1 block w-full"
                    />

                    <InputError
                        :message="form.errors.sub_topic_4"
                        class="mt-2"
                    />
                </div>

                <div class="mt-6">
                    <InputLabel for="Keyword" value="Keyword" />

                    <TextInput
                        id="keyword"
                        ref="keyword"
                        v-model="form.keyword"
                        type="text"
                        class="mt-1 block w-full"
                    />

                    <InputError :message="form.errors.keyword" class="mt-2" />
                </div>

                <div class="mt-6">
                    <InputLabel for="SEO title" value="SEO Title" />

                    <TextInput
                        id="seo_title"
                        ref="seo_title"
                        v-model="form.seo_title"
                        type="text"
                        class="mt-1 block w-full"
                    />

                    <InputError :message="form.errors.seo_title" class="mt-2" />
                </div>

                <div class="mt-6">
                    <InputLabel for="SERP Analysis" value="SERP Analysis" />

                    <TextInput
                        id="serp_analysis"
                        ref="serp_analysis"
                        v-model="form.serp_analysis"
                        type="text"
                        class="mt-1 block w-full"
                    />

                    <InputError
                        :message="form.errors.serp_analysis"
                        class="mt-2"
                    />
                </div>

                <div class="mt-6">
                    <InputLabel for="Content Type" value="Content Type" />

                    <TextInput
                        id="content_type"
                        ref="content_type"
                        v-model="form.content_type"
                        type="text"
                        class="mt-1 block w-full"
                    />

                    <InputError
                        :message="form.errors.content_type"
                        class="mt-2"
                    />
                </div>

                <div class="mt-6">
                    <InputLabel for="Search Content" value="Search Content" />

                    <TextInput
                        id="search_content"
                        ref="search_content"
                        v-model="form.search_content"
                        type="text"
                        class="mt-1 block w-full"
                    />

                    <InputError
                        :message="form.errors.search_content"
                        class="mt-2"
                    />
                </div>

                <div class="mt-6">
                    <InputLabel for="Search Volume" value="Search Volume" />

                    <TextInput
                        id="search_volume"
                        ref="search_volume"
                        v-model="form.search_volume"
                        type="text"
                        class="mt-1 block w-full"
                    />

                    <InputError
                        :message="form.errors.search_volume"
                        class="mt-2"
                    />
                </div>

                <div class="mt-6">
                    <InputLabel for="CPC" value="CPC" />

                    <TextInput
                        id="cpc"
                        ref="cpc"
                        v-model="form.cpc"
                        type="text"
                        class="mt-1 block w-full"
                    />

                    <InputError :message="form.errors.cpc" class="mt-2" />
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
        </form>
    </Modal>
</template>
