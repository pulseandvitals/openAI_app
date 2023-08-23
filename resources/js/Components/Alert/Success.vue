<template>
    <div
        class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mt-2"
        role="alert"
        v-if="$page.props.flash.message"
    >
        <p class="font-bold">Success</p>
        <p>{{ $page.props.flash.message }}</p>
    </div>
</template>
