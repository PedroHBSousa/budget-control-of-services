<script setup lang="ts">
import { defineProps } from 'vue';
import { Head } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

interface Customer {
    id: number;
    name: string;
    email: string;
    phone: string;
    address: {
        street: string;
        number: string;
        city: string;
        state: string;
        zip: string;
    };
}

defineProps<{
    customer: Customer;
}>();
</script>

<template>

    <Head title="Perfil" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Cliente
            </h2>
        </template>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="flex justify-between">
                            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                                {{ customer.name }}
                            </h2>
                        </div>
                        <div class="mt-4">
                            <p class="text-sm text-gray-600">
                                <strong>Email:</strong> {{ customer.email }}
                            </p>
                            <p class="text-sm text-gray-600">
                                <strong>Telefone:</strong> {{ customer.phone }}
                            </p>
                            <p class="text-sm text-gray-600">
                                <strong>Endereço:</strong> {{ customer.address.street }},
                                {{ customer.address.number }} - {{ customer.address.city }}/{{
                                    customer.address.state }}
                            </p>
                            <p class="text-sm text-gray-600">
                                <strong>CEP:</strong> {{ customer.address.zip }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
