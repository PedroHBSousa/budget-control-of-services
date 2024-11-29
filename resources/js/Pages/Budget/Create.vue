<script setup lang="ts">
import axios from 'axios';
import { watch, ref } from 'vue';
import { useForm, router, Head } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import ServiceInput from '@/Components/ServiceInput.vue';

const form = useForm({

});

const goToIndex = () => {
    router.visit('/budgets');
};

// Lista reativa de serviços
const services = ref<number[]>([]);

// Função para adicionar um novo serviço
const createService = () => {
    services.value.push(services.value.length + 1); // Adiciona um identificador único
};

</script>

<template>

    <Head title="Cadastrar" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Cadastrar Orçamento
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="md:col-span-2 flex items-center justify-end mt-4 gap-2">
                            <SecondaryButton @click="createService">
                                Adicionar Serviço
                            </SecondaryButton>
                            <SecondaryButton>
                                Adicionar Produto
                            </SecondaryButton>
                        </div>

                        <div class="w-full">
                            <TransitionGroup name="list" tag="div">
                                <ServiceInput v-for="service in services" :key="service" :id="service" />
                            </TransitionGroup>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style>
.list-enter-active,
.list-leave-active {
    transition: all 0.5s ease;
}

.list-enter-from,
.list-leave-to {
    opacity: 0;
    transform: translateX(30px);
}
</style>
