<template>
    <div
        class="fixed right-[0] bottom-5 rounded-lg bg-green-200 px-3 py-2 flex item-center text-green-700"
        role="alert"
        v-if="$page.props.flash.message"
    >
        <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            class="w-6 h-6 mr-3"
        >
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
            />
        </svg>

        <p>{{ $page.props.flash.message }}</p>
    </div>
</template>
