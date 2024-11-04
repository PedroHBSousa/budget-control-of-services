v
<script setup>
</script>
<template>
    <div class="overflow-hidden border border-gray-200  md:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <slot name="teste"></slot>
            </thead>
            <tbody>
                <slot></slot>
            </tbody>
        </table>
    </div>
</template>
