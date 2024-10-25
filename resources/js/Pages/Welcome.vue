<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import { CoBrandCashapp } from '@kalimahapps/vue-icons';

defineProps<{
    canLogin?: boolean;
    canRegister?: boolean;
    laravelVersion: string;
    phpVersion: string;
}>();

function handleImageError() {
    document.getElementById('screenshot-container')?.classList.add('!hidden');
    document.getElementById('docs-card')?.classList.add('!row-span-1');
    document.getElementById('docs-card-content')?.classList.add('!flex-row');
    document.getElementById('background')?.classList.add('!hidden');
}
</script>

<template>

    <Head title="Bem-vindo" />
    <div class="bg-gray-900 text-black/50 dark:bg-gray-900 dark:text-white/50">
        <div
            class="relative flex min-h-screen flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <header class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8">
                    <div class="flex justify-center lg:col-start-2">
                        <CoBrandCashapp class="text-indigo-500 text-4xl mr-2" />
                    </div>
                    <nav v-if="canLogin" class="flex justify-center lg:justify-end">
                        <Link v-if="$page.props.auth.user" :href="route('dashboard')"
                            class="text-lg font-semibold grounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                        Dashboard
                        </Link>

                        <template v-else>
                            <Link :href="route('login')"
                                class="text-lg font-semibold frounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                            Entrar
                            </Link>

                            <Link v-if="canRegister" :href="route('register')"
                                class="text-lg font-semibold rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                            Criar Conta
                            </Link>
                        </template>
                    </nav>
                </header>
                <main class="mt-6">
                    <div class="bg-gray-900 py-20">
                        <div class="container mx-auto px-6 md:px-12">
                            <div class="flex flex-col md:flex-row items-center">
                                <div class="md:w-1/2 lg:w-2/3">
                                    <h1 class="text-4xl md:text-6xl lg:text-7xl text-white font-bold mb-6">
                                        Bem-vindo ao<br class="hidden md:block" />
                                        <span class="text-indigo-500">Orçamento</span> Fácil
                                    </h1>
                                    <p class="text-lg md:text-xl lg:text-2xl text-gray-400 mb-8">
                                        Gerencie todos os seus orçamentos em um só lugar, otimizando seu tempo e
                                        aumentando a
                                        produtividade do seu negócio.
                                    </p>
                                    <div class="flex gap-2">
                                        <a href="#"
                                            class="bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-3 px-6 rounded-md">Começar
                                        </a>
                                        <a href="#"
                                            class="bg-gray-700 hover:bg-gray-600 text-white font-bold py-3 px-6 rounded-md">Leia
                                            Mais
                                        </a>
                                    </div>
                                </div>
                                <div class="md:w-1/2 lg:w-1/3 mt-8 md:mt-0">
                                    <img src="../../img/welcome.png" alt="Hero Image" class="rounded-lg w-full" />
                                </div>
                            </div>
                        </div>
                    </div>
                </main>

                <footer class="py-16 text-center text-sm text-black dark:text-white/70">

                </footer>
            </div>
        </div>
    </div>
</template>
