<script setup lang="ts">
import { ref, onMounted } from 'vue';

const props = defineProps<{
    message: string | null;
}>();

const showFlashMessage = ref(false);

onMounted(() => {
    showFlashMessage.value = true;
    setTimeout(() => (showFlashMessage.value = false), 5000);
});
</script>
<template>
    <div v-if="message && showFlashMessage" class="mt-4 p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50"
        role="alert">
        <p class="font-semibold">{{ props.message }}</p>
    </div>
</template>
