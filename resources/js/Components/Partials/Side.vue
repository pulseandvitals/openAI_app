<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
</script>

<template>
    <aside
        id="default-sidebar"
        class="h-screen fixed p-30 top-0 z-40 w-64 transition-transform"
        aria-label="Sidebar"
    >
        <div class="h-full px-3 py-4 overflow-y-auto bg-white rounded-lg">
            <div class="flex justify-start items-center">
                <span class="font-bold text-blue-300 text-lg"> Nest18</span>
                <ApplicationLogo class="w-10 h-10 ml-2" />
            </div>

            <ul class="space-y-2 font-medium mt-5">
                <Link
                    class="flex items-center p-2 rounded-lg text-gray-500 hover:text-white hover:bg-blue-500 group"
                    :href="route('document.index')"
                    :class="[
                        route().current('document.*')
                            ? 'bg-blue-500 text-white'
                            : '',
                    ]"
                >
                    <svg
                        class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 d dark:text-blue-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25M9 16.5v.75m3-3v3M15 12v5.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"
                        />
                    </svg>

                    <span class="flex-1 ml-3 whitespace-nowrap"
                        >Topical Map</span
                    >
                </Link>

                <Link
                    class="flex items-center p-2 rounded-lg text-gray-500 hover:text-white hover:bg-blue-500 group"
                >
                    <svg
                        class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 d dark:text-blue-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M15.75 15.75l-2.489-2.489m0 0a3.375 3.375 0 10-4.773-4.773 3.375 3.375 0 004.774 4.774zM21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                        />
                    </svg>

                    <span class="flex-1 ml-3 whitespace-nowrap"
                        >Content Brief</span
                    >
                </Link>

                <Link
                    class="flex items-center p-2 rounded-lg text-gray-500 hover:text-white hover:bg-blue-500 group"
                >
                    <svg
                        class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 d dark:text-blue-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"
                        />
                    </svg>

                    <span class="flex-1 ml-3 whitespace-nowrap"
                        >Content Writer</span
                    >
                </Link>

                <Link
                    class="flex items-center p-2 rounded-lg text-gray-500 hover:text-white hover:bg-blue-500 group"
                >
                    <svg
                        class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 d dark:text-blue-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z"
                        />
                    </svg>

                    <span class="flex-1 ml-3 whitespace-nowrap">Publish</span>
                </Link>

                <Link
                    class="flex items-center p-2 rounded-lg text-gray-500 hover:text-white hover:bg-blue-500 group"
                    :href="route('generator.index')"
                    :class="[
                        route().current('generator.*')
                            ? 'bg-blue-500 text-white'
                            : '',
                    ]"
                >
                    <svg
                        class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 d dark:text-blue-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor"
                        viewBox="0 0 18 18"
                    >
                        <path
                            d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z"
                        />
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">OpenAI</span>
                </Link>

                <Link
                    class="flex items-center p-2 rounded-lg text-gray-500 hover:text-white hover:bg-blue-500 group"
                    :href="route('website.index')"
                    :class="[
                        route().current('website.*')
                            ? 'bg-blue-500 text-white'
                            : '',
                    ]"
                >
                    <svg
                        class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 d dark:text-blue-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor"
                        viewBox="0 0 18 18"
                    >
                        <path
                            d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z"
                        />
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Website</span>
                </Link>

                <Link
                    class="flex items-center p-2 rounded-lg text-gray-500 hover:text-white hover:bg-blue-500 group"
                    :href="route('user.index')"
                    :class="[
                        route().current('user.*')
                            ? 'bg-blue-500 text-white'
                            : '',
                    ]"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 d dark:text-blue-400 group-hover:text-gray-900 dark:group-hover:text-white"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"
                        />
                    </svg>

                    <span class="flex-1 ml-3 whitespace-nowrap"
                        >User Management</span
                    >
                </Link>

                <Link
                    class="flex items-center p-2 rounded-lg text-gray-500 hover:text-white hover:bg-blue-500 group"
                    :href="route('website.index')"
                    :class="[
                        route().current('website.index')
                            ? 'bg-blue-500 text-white'
                            : '',
                    ]"
                >
                    <svg
                        class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 d dark:text-blue-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M10.343 3.94c.09-.542.56-.94 1.11-.94h1.093c.55 0 1.02.398 1.11.94l.149.894c.07.424.384.764.78.93.398.164.855.142 1.205-.108l.737-.527a1.125 1.125 0 011.45.12l.773.774c.39.389.44 1.002.12 1.45l-.527.737c-.25.35-.272.806-.107 1.204.165.397.505.71.93.78l.893.15c.543.09.94.56.94 1.109v1.094c0 .55-.397 1.02-.94 1.11l-.893.149c-.425.07-.765.383-.93.78-.165.398-.143.854.107 1.204l.527.738c.32.447.269 1.06-.12 1.45l-.774.773a1.125 1.125 0 01-1.449.12l-.738-.527c-.35-.25-.806-.272-1.203-.107-.397.165-.71.505-.781.929l-.149.894c-.09.542-.56.94-1.11.94h-1.094c-.55 0-1.019-.398-1.11-.94l-.148-.894c-.071-.424-.384-.764-.781-.93-.398-.164-.854-.142-1.204.108l-.738.527c-.447.32-1.06.269-1.45-.12l-.773-.774a1.125 1.125 0 01-.12-1.45l.527-.737c.25-.35.273-.806.108-1.204-.165-.397-.505-.71-.93-.78l-.894-.15c-.542-.09-.94-.56-.94-1.109v-1.094c0-.55.398-1.02.94-1.11l.894-.149c.424-.07.765-.383.93-.78.165-.398.143-.854-.107-1.204l-.527-.738a1.125 1.125 0 01.12-1.45l.773-.773a1.125 1.125 0 011.45-.12l.737.527c.35.25.807.272 1.204.107.397-.165.71-.505.78-.929l.15-.894z"
                        />
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                        />
                    </svg>

                    <span class="flex-1 ml-3 whitespace-nowrap">Settings</span>
                </Link>
            </ul>
            <div class="static">
                <div class="absolute bottom-2 left-0 px-6">
                    <p>Name here. (Incomplete)</p>
                </div>
            </div>
        </div>
    </aside>
</template>
