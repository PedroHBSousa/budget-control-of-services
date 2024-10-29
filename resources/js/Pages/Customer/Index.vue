<script setup lang="ts">
import { ref } from 'vue';
import { router, Head, useForm } from '@inertiajs/vue3';
import { McDelete2Line, BxEdit, AkEyeOpen } from '@kalimahapps/vue-icons';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import Modal from '@/Components/Modal.vue';
import DangerButton from '@/Components/DangerButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';

const form = useForm({});

defineProps({
    customers: Object
});

const showConfirmDeleteCustomerModal = ref(false);
const customerToDelete = ref<number | null>(null);

const confirmDeleteClient = (id: number) => {
    customerToDelete.value = id;
    showConfirmDeleteCustomerModal.value = true;
};
const closeModal = () => {
    showConfirmDeleteCustomerModal.value = false;
    customerToDelete.value = null;
};

const deleteClient = () => {
    if (customerToDelete.value !== null) {
        form.delete(route('customers.destroy', customerToDelete.value), {
            onSuccess: () => {
                closeModal();
            },
        });
    }
};

const goToCreateClient = () => {
    router.visit('/customers/create');
};

const editClient = (id: number) => {
    router.visit(`/customers/${id}/edit`);
};

const viewClient = (id: number) => {
    router.visit(`/customers/${id}`);
};
</script>

<template>

    <Head title="Clientes" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Clientes
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <PrimaryButton @click="goToCreateClient">
                            Cadastrar Cliente
                        </PrimaryButton>

                        <div>
                            <h3 class="mt-4 text-lg font-semibold text-gray-800">Lista de Clientes</h3>
                            <ul class="bg-white rounded-lg divide-y divide-gray-200 mt-4">
                                <li v-for="customer in customers" :key="customer.id"
                                    class="flex justify-between items-center py-4 px-6 hover:bg-gray-50 hover:rounded-lg">
                                    <div>
                                        <span class="block font-medium text-gray-900">{{ customer.name }}</span>
                                        <span class="text-sm text-gray-600">{{ customer.phone }}</span>
                                    </div>
                                    <div class="flex space-x-2">
                                        <button @click="viewClient(customer.id)">
                                            <AkEyeOpen class="text-indigo-500 hover:text-indigo-400 text-2xl mr-2" />
                                        </button>
                                        <button @click="editClient(customer.id)">
                                            <BxEdit class="text-yellow-500 hover:text-yellow-400 text-2xl mr-2" />
                                        </button>
                                        <button @click="confirmDeleteClient(customer.id)">
                                            <McDelete2Line class="text-red-500 hover:text-red-400 text-2xl mr-2" />
                                        </button>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>

    <Modal :show="showConfirmDeleteCustomerModal" @close="closeModal">
        <div class="p-6">
            <h2 class="text-lg font-semibold text-slate-800">Você tem certeza que deseja excluir este cliente?</h2>
            <div class="mt-6 flex space-x-4">
                <DangerButton @click="deleteClient">
                    Excluir
                </DangerButton>
                <SecondaryButton @click="closeModal">
                    Cancelar
                </SecondaryButton>
            </div>
        </div>
    </Modal>
</template>
