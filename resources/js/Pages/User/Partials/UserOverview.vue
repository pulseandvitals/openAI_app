<script setup>
defineProps({
    counts: Object,
});
</script>

<template>
    <div class="py-6 ml-8">
        <div class="bg-white overflow-hidden shadow-sm rounded-lg">
            <div class="p-6 text-2xl text-gray-500 font-bold">
                User Overview
            </div>
            <div
                class="max-w-12xl mx-auto sm:px-6 lg:px-8 grid grid-cols-3 gap-5"
            >
                <div
                    class="bg-blue-100 overflow-hidden shadow-sm rounded-lg my-5"
                >
                    <div class="flex justify-between">
                        <div class="p-6 text-gray-500 text-lg font-extrabold">
                            Total Users
                        </div>
                        <div class="p-6 text-blue-400 font-extrabold text-2xl">
                            {{ counts.total }}
                        </div>
                    </div>
                </div>

                <div
                    class="bg-blue-100 overflow-hidden shadow-sm rounded-lg my-5"
                >
                    <div class="flex justify-between">
                        <div class="p-6 text-gray-500 text-lg font-extrabold">
                            Admin
                        </div>
                        <div class="p-6 text-blue-400 font-extrabold text-2xl">
                            {{ counts.admin }}
                        </div>
                    </div>
                </div>
                <div
                    class="bg-blue-100 overflow-hidden shadow-sm rounded-lg my-5"
                >
                    <div class="flex justify-between">
                        <div class="p-6 text-gray-500 text-lg font-extrabold">
                            User
                        </div>
                        <div class="p-6 text-blue-400 font-extrabold text-2xl">
                            {{ counts.user }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
