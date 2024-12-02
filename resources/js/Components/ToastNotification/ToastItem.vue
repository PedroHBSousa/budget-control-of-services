<script setup lang="ts">
import { ref, onMounted } from 'vue';
import { CaCloseLarge, FaCheck } from '@kalimahapps/vue-icons';

const props = defineProps({
    message: String,
    duration: {
        type: Number,
        default: 5000
    }
});

onMounted(() => {
    setTimeout(() => emit("remove"), props.duration);
});

const emit = defineEmits(["remove"]);

</script>
<template>
    <div id="toast-default" class="flex items-center rounded-lg bg-white p-4 text-gray-500 shadow " role="alert">
        <div
            class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-600 bg-green-50 rounded-lg">
            <FaCheck class="text-xl" />
        </div>
        <div class="ms-3 text-sm font-normal">{{ props.message }}</div>
        <button type="button"
            class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8"
            data-dismiss-target="#toast-default" aria-label="Close" @click="emit('remove')">
            <CaCloseLarge class="text-xl" />
        </button>
    </div>
</template>
