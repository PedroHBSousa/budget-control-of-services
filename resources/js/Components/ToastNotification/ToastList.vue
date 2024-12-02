<script setup lang="ts">
import ToastItem from "@/Components/ToastNotification/ToastItem.vue"
import { onUnmounted, ref } from "vue";
import { usePage, router } from '@inertiajs/vue3';
import { User } from "@/types";
import toast from "@/Stores/toast"

const page = usePage<{ flash: { message: string }, auth: { user: User } }>();

let removeFinshEventListener = router.on("finish", () => {
    if (page.props.flash.message) {
        toast.add({
            message: page.props.flash.message,
        });
    }
});

onUnmounted(() => removeFinshEventListener());

function remove(index: number) {
    toast.remove(index);
}
</script>
<template>
    <TransitionGroup tag="div" enter-from-class="translate-x-full opacity-0" enter-active-class="duration-500"
        leave-active-class="duration-500" leave-to-class="translate-x-full opacity-0"
        class="fixed top-4 right-4 z-50 w-full max-w-xs space-y-4">
        <ToastItem v-for="(item, index) in toast.items" :key="item.key" :message="item.message" :duration="5000"
            @remove="remove(index)" />
    </TransitionGroup>
</template>
