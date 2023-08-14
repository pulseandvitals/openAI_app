<template>
    <div class="relative overflow-x-auto sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <slot name="thead" />
            </thead>
            <tbody>
                <slot name="tbody" />
            </tbody>
        </table>
    </div>
</template>
