<script setup>
import { Link } from '@inertiajs/vue3'

defineProps({
    pagination: Object
})

const formatLabel = (label) => {
    if (label === '&laquo; Previous') {
        return 'Anterior';
    } else if (label === 'Next &raquo;') {
        return 'Próximo';
    }
    return label;
}
</script>

<template>
    <nav class="relative flex justify-center mt-5">
        <template v-for="link in pagination.links" :key="link.label">
            <Link preserve-scroll :href="link.url ?? ''" v-html="formatLabel(link.label)"
                class="flex items-center justify-center px-3 py-2 text-sm rounded-lg text-gray-600"
                :class="{ 'bg-gray-200': link.active, '!text-gray-300': !link.url }" />
        </template>
    </nav>
</template>
