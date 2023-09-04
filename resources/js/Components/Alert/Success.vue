<template>
    <div
        class="fixed right-3 top-3 rounded-lg bg-blue-200 px-6 py-2"
        role="alert"
        v-if="$page.props.flash.message"
    >
        <p>{{ $page.props.flash.message }}</p>
    </div>
</template>
