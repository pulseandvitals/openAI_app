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
    user: Object,
});
const form = useForm({
    name: props.user.name,
    email: props.user.email,
    role: props.user.role,
});

const ModalEditUser = ref(false);

const closeModal = () => {
    ModalEditUser.value = false;
    form.reset();
};
const EditUserModal = () => {
    ModalEditUser.value = true;
};
function submit(user) {
    form.patch(route("user.update", { user: user }), {
        preserveScroll: true,
        preserveState: true,
    });
}
</script>
<template>
    <button @click="EditUserModal" class="font-xs text-gray-300 mr-2">
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
    <Modal :show="ModalEditUser" @close="closeModal">
        <form @submit.prevent="submit(user)" class="space-y-6">
            <div class="p-6">
                <h2 class="text-lg font-medium text-gray-900">
                    Edit User "{{ user.name }}" information.
                </h2>
                <div class="mt-6">
                    <div>
                        <InputLabel for="name" value="Name" class="mt-1" />

                        <TextInput
                            id="name"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.name"
                        />

                        <InputError class="mt-2" :message="form.errors.name" />
                    </div>
                    <div>
                        <InputLabel for="email" value="Email" class="mt-1" />

                        <TextInput
                            id="name"
                            type="email"
                            class="mt-1 block w-full"
                            v-model="form.email"
                        />

                        <InputError class="mt-2" :message="form.errors.email" />
                    </div>

                    <div>
                        <InputLabel for="role" value="Role" class="mt-1" />

                        <select
                            v-model="form.role"
                            :selected="form.role"
                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                        >
                            <option value="1">Admin</option>
                            <option value="0">User</option>
                        </select>

                        <InputError class="mt-2" :message="form.errors.role" />
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
        </form>
    </Modal>
</template>
