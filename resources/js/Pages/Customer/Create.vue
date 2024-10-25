<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useForm, router, Head } from '@inertiajs/vue3';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';

const form = useForm({
    name: '',
    email: '',
    phone: '',
    street: '',
    number: '',
    city: '',
    state: '',
    zip: '',
});

const submit = () => {
    form.post(route('customers.store'), {
        onFinish: () => {
            form.reset('name', 'email', 'phone', 'street', 'number', 'city', 'state', 'zip');
        },
    });
};

const goToCostumers = () => {
    router.visit('/customers');
};
</script>

<template>

    <Head title="Cadastrar" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Cadastrar Cliente
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">

                        <PrimaryButton @click="goToCostumers">
                            Voltar à Lista
                        </PrimaryButton>
                        <h3 class="mt-4 text-lg font-semibold">Insira os dados abaixo</h3>
                        <form @submit.prevent="submit">
                            <div>
                                <InputLabel for="name" value="Nome" />
                                <TextInput id="name" type="text" v-model="form.name" label="Nome"
                                    class="mt-1 block w-full" required autofocus />
                                <InputError class="mt-2" :message="form.errors.name" />
                            </div>

                            <div class="mt-4">
                                <InputLabel for="email" value="Email" />
                                <TextInput id="email" type="email" v-model="form.email" label="Email"
                                    class="mt-1 block w-full" required />
                                <InputError class="mt-2" :message="form.errors.email" />
                            </div>

                            <div class="mt-4">
                                <InputLabel for="phone" value="Celular" />
                                <TextInput id="phone" type="tel" class="mt-1 block w-full" v-model="form.phone" required
                                    autocomplete="" />
                                <InputError class="mt-2" :message="form.errors.phone" />
                            </div>

                            <div class="mt-4">
                                <InputLabel for="zip" value="CEP" />
                                <TextInput id="zip" type="text" class="mt-1 block w-full" v-model="form.zip" required
                                    autocomplete="" />
                                <InputError class="mt-2" :message="form.errors.zip" />
                            </div>

                            <div class="mt-4">
                                <InputLabel for="street" value="Rua" />
                                <TextInput id="street" type="text" class="mt-1 block w-full" v-model="form.street"
                                    required autocomplete="" />
                                <InputError class="mt-2" :message="form.errors.street" />
                            </div>

                            <div class="mt-4">
                                <InputLabel for="number" value="Número" />
                                <TextInput id="number" type="text" class="mt-1 block w-full" v-model="form.number"
                                    required autocomplete="" />
                                <InputError class="mt-2" :message="form.errors.number" />
                            </div>

                            <div class="mt-4">
                                <InputLabel for="city" value="Cidade" />
                                <TextInput id="city" type="text" class="mt-1 block w-full" v-model="form.city" required
                                    autocomplete="" />
                                <InputError class="mt-2" :message="form.errors.city" />
                            </div>

                            <div class="mt-4">
                                <InputLabel for="state" value="Estado" />
                                <TextInput id="state" type="text" class="mt-1 block w-full" v-model="form.state"
                                    required autocomplete="" />
                                <InputError class="mt-2" :message="form.errors.state" />
                            </div>

                            <div class="mt-4 flex items-center justify-end">
                                <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }"
                                    :disabled="form.processing">
                                    Salvar
                                </PrimaryButton>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
