<script setup>
defineProps({
    status: Boolean,
});
</script>

<template>
    <span
        :class="[
            status == 'Admin'
                ? 'bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300'
                : 'bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300',
        ]"
        >{{ status }}</span
    >
</template>
