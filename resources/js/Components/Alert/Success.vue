<template>
    <div
        class="bg-teal-100 border-t-4 border-green-500 rounded-b text-green-900 px-4 py-3 shadow-md max-w-7xl mx-auto sm:px-6 mt-2"
        role="alert"
        v-if="$page.props.flash.message"
    >
        <div class="flex">
            <div class="py-3 mr-4">
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
                        d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                    />
                </svg>
            </div>
            <div>
                <p class="font-bold">Prompt</p>
                <p class="text-sm">
                    {{ $page.props.flash.message }}
                </p>
            </div>
        </div>
    </div>
</template>
