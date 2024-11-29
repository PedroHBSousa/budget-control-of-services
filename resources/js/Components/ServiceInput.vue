<script setup lang="ts">
import { ref } from 'vue';
import InputLabel from './InputLabel.vue';
import TextInput from './TextInput.vue';
import { useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    price: '',
});

</script>

<template>
    <div>
        <h3 class="text-base font-medium">Serviço</h3>
        <div class="flex gap-2 mt-2 mb-5 w-full">
            <div>
                <InputLabel for="name" label="Nome" />
                <TextInput id="name" v-model="form.name" placeholder="Nome" />
            </div>
            <div>
                <InputLabel for="value" label="Valor" />
                <TextInput id="value" v-model="form.price" placeholder="Descrição" />
            </div>
            <div>
                <InputLabel for="service" label="Serviço" />
                <TextInput id="service" v-model="form.name" placeholder="Preço" type="number" />
            </div>
        </div>
    </div>
</template>
