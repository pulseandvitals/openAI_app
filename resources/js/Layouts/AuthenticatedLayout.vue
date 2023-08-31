<script setup>
import Nav from "@/Components/Partials/Nav.vue";
import Side from "@/Components/Partials/Side.vue";
</script>

<template>
    <div>
        <Nav />

        <div class="min-h-screen bg-gray-100">
            <Side />
            <!-- Page Content -->
            <main class="mx-auto flex-1 ml-60">
                <slot />
            </main>
        </div>
    </div>
</template>
