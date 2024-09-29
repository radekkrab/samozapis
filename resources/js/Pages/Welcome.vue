<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});

function handleImageError() {
    document.getElementById('screenshot-container')?.classList.add('!hidden');
    document.getElementById('docs-card')?.classList.add('!row-span-1');
    document.getElementById('docs-card-content')?.classList.add('!flex-row');
    document.getElementById('background')?.classList.add('!hidden');
}
</script>

<template>

    <Head title="Welcome" />
    
    <div class="h-full bg-cover bg-center" style="background-image: url('storage/img/welcome-bg.webp'); background-attachment: fixed;">
        <div
            class="min-h-screen relative flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="w-full max-w-2xl px-6 lg:max-w-7xl">
                <div class="px-5 flex md:justify-center justify-stretch mx-auto sm:w-5/6 pt-10 md:pt-20 items-center gap-8">
                    <img src="storage/img/logo.jpeg" class="sm:w-24 w-16 rounded-full">
                    <h1 class="title-font md:text-4xl sm:text-2xl text-xl mb-2 font-medium text-gray-50"
                        style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">Добро пожаловать<span class="hidden md:inline"> в Самозапись</span>!
                    </h1>
                </div>
                <main>
                    <section class="text-gray-600 body-font">
                        <div class="container mx-auto flex px-5 xl:py-20 py-5 md:py-2 lg:flex-row flex-col items-center">
                            <div class="lg:w-1/2 sm:w-5/6 mb-5 md:mb-0">
                                <img class="object-cover object-center rounded" alt="hero"
                                    src="storage/img/welcome.jpg">
                            </div>
                            <div
                                class="lg:w-1/2 md:pl-16 md:pt-3 flex flex-col md:items-start md:text-left items-center text-center">
                                <h1 class="title-font sm:text-4xl text-2xl mb-4 font-medium text-gray-50"
                                    style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">Самозапись -
                                    приложение для самозанятых.
                                </h1>
                                <p class="mb-4 leading-relaxed text-balance text-gray-100"
                                    style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">
                                    ✅ Удобная запись для клиентов: Просто отправьте им ссылку на ваш
                                    календарь.<br>
                                    ✅ Легкий учёт: Все записи клиентов будут автоматически сохраняться в вашем профиле.
                                    Получайте уведомления о предстоящих записях.<br>
                                    ✅Интуитивно понятный интерфейс: Мы сделали приложение простым и удобным в
                                    использовании.<br></p>
                                <div class="flex justify-center">
                                    <nav v-if="canLogin" class="-mx-3 flex flex-1 justify-end">
                                        <Link v-if="$page.props.auth.user" :href="route('dashboard')"
                                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                        Dashboard
                                        </Link>

                                        <template v-else>
                                            <Link :href="route('login')"
                                                class="inline-flex text-white bg-blue-500 shadow-md py-2 px-6 focus:outline-none hover:bg-blue-900 rounded text-lg">
                                            Войти
                                            </Link>

                                            <Link v-if="canRegister" :href="route('register')"
                                                class="ml-4 inline-flex text-gray-700 bg-gray-100 shadow-md  py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg">
                                            Зарегистрироваться
                                            </Link>
                                        </template>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </section>
                </main>

                <footer class="py-10 text-center text-sm text-gray-900"
                    style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">
                    Разработано PHP Development на базе Laravel v{{ laravelVersion }} (PHP v{{ phpVersion }})
                </footer>
            </div>
        </div>
    </div>
</template>
