<script setup lang="ts">
import { ref } from 'vue';
import { router, Head, useForm } from '@inertiajs/vue3';
import { LuUserRoundPlus, FlDelete, CiEdit, IoOutlineEye, BxMessageAltError } from '@kalimahapps/vue-icons';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import Modal from '@/Components/Modal.vue';
import DangerButton from '@/Components/DangerButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TableRow from '@/Components/Table/TableRow.vue';
import TableHeader from '@/Components/Table/TableHeader.vue';
import Table from '@/Components/Table/Table.vue';
import TableData from '@/Components/Table/TableData.vue';
import TableRowHeader from '@/Components/Table/TableRowHeader.vue';
import Pagination from '@/Components/Pagination.vue';

const form = useForm({});

defineProps({
    customers: {
        type: Object,
        required: true,
    }
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
                        <PrimaryButton class="group flex items-center gap-2" @click="goToCreateClient">
                            <LuUserRoundPlus class="text-indigo-600 text-2xl group-hover:stroke-white" />
                            Adicionar Cliente
                        </PrimaryButton>

                        <div class="mt-4">
                            <Table>
                                <template #teste>
                                    <TableRowHeader>
                                        <TableHeader>Nome</TableHeader>
                                        <TableHeader>Celular</TableHeader>
                                        <TableHeader>Email</TableHeader>
                                        <TableHeader>Ações</TableHeader>
                                    </TableRowHeader>
                                </template>
                                <template #default>
                                    <TableRow v-for="customer in customers.data" :key="customer.id">
                                        <TableData>
                                            {{ customer.name }}</TableData>
                                        <TableData>
                                            {{ customer.phone }}</TableData>
                                        <TableData>
                                            {{ customer.email }}</TableData>
                                        <TableData>
                                            <div class="flex items-center gap-1">
                                                <button @click="viewClient(customer.id)">
                                                    <IoOutlineEye
                                                        class="text-indigo-500 hover:text-indigo-400 text-2xl mr-2" />
                                                </button>
                                                <button @click="editClient(customer.id)">
                                                    <CiEdit
                                                        class="text-yellow-500 hover:text-yellow-400 text-2xl mr-2" />
                                                </button>
                                                <button @click="confirmDeleteClient(customer.id)">
                                                    <FlDelete class="text-red-500 hover:text-red-400 text-2xl mr-2" />
                                                </button>
                                            </div>
                                        </TableData>
                                    </TableRow>
                                </template>
                            </Table>
                            <Pagination :pagination="customers" />
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
