v
<script setup>
</script>
<template>
    <div class="overflow-x-auto border border-gray-200 rounded-lg">
        <table class="min-w-full rounded-xl">
            <thead class="bg-gray-50">
                <slot name="teste"></slot>
            </thead>
            <tbody class="divide-y divide-gray-300">
                <slot></slot>
            </tbody>
        </table>
    </div>
</template>
