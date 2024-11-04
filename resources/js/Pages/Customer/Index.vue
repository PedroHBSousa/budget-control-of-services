<script setup lang="ts">
import { ref } from 'vue';
import { router, Head, useForm } from '@inertiajs/vue3';
import { McDelete2Line, BxEdit, AkEyeOpen } from '@kalimahapps/vue-icons';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import Modal from '@/Components/Modal.vue';
import DangerButton from '@/Components/DangerButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TableRow from '@/Components/Table/TableRow.vue';
import TableHeader from '@/Components/Table/TableHeader.vue';
import Table from '@/Components/Table/Table.vue';
import TableData from '@/Components/Table/TableData.vue';

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
                        <div class="mt-4">
                            <Table>
                                <template #teste>
                                    <TableRow>
                                        <TableHeader>Nome</TableHeader>
                                        <TableHeader>Celular</TableHeader>
                                        <TableHeader>Ações</TableHeader>
                                    </TableRow>
                                </template>
                                <template #default>
                                    <TableRow v-for="customer in customers" :key="customer.id" class="border-b">
                                        <TableData class="px-4 py-4 text-sm text-gray-500 whitespace-nowrap">
                                            {{ customer.name }}</TableData>
                                        <TableData class="px-4 py-4 text-sm text-gray-500 whitespace-nowrap">
                                            {{ customer.phone }}</TableData>
                                        <TableData class="space-x-4 px-4 py-4 text-sm text-gray-500 whitespace-nowrap">
                                            <button @click="viewClient(customer.id)">
                                                <AkEyeOpen
                                                    class="text-indigo-500 hover:text-indigo-400 text-2xl mr-2" />
                                            </button>
                                            <button @click="editClient(customer.id)">
                                                <BxEdit class="text-yellow-500 hover:text-yellow-400 text-2xl mr-2" />
                                            </button>
                                            <button @click="confirmDeleteClient(customer.id)">
                                                <McDelete2Line class="text-red-500 hover:text-red-400 text-2xl mr-2" />
                                            </button>
                                        </TableData>
                                    </TableRow>
                                </template>
                            </Table>
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
