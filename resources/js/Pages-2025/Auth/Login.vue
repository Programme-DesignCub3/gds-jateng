<script setup lang="ts">
import Checkbox from "@/Components/Checkbox.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import LoginLayout from "@/Layouts/LoginLayout.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import LoginLogo from "@/Components/LoginLogo.vue";

defineProps<{
    canResetPassword?: boolean;
    status?: string;
}>();

const form = useForm({
    email: "",
    password: "",
    remember: false,
});

const submit = () => {
    form.post(route("login"), {
        onFinish: () => {
            form.reset("password");
        },
    });
};
</script>

<template>
    <AppLayout fixed-nav>
        <LoginLayout bg-image="/assets/images/new/home.png">
            <Head title="Log in" />
            <div
                class="absolute top-0 right-4 z-0 w-[10%] hidden sm:block h-full bg-no-repeat bg-contain bg-right pointer-events-none overflow-hidden"
                style="background-image: url('/assets/images/new/icon-login-page.png')"
            ></div>
            <div v-if="status" class="mb-4 text-sm font-medium text-green-600">
                {{ status }}
            </div>
            <div class="relative w-full max-w-xl p-4 rounded-[3rem">
                <!-- Blur border layer -->
                <div class="absolute inset-0 rounded-[3rem] border-[8px] blur-md bg-white p-8">
                </div>
                <div class="relative bg-white/10 px-12 py-16 rounded-[3rem]">
                    <div class="mx-auto w-full max-w-lg fill-current flex items-center justify-center mb-4">
                        <LoginLogo />
                    </div>
                    <div class="w-full font-bold">
                        <form @submit.prevent="submit">
                            <div>
                                <InputLabel
                                    class="font-bold"
                                    for="email"
                                    value="Email"
                                />
                                <TextInput
                                    id="email"
                                    type="email"
                                    class="mt-1 block w-full"
                                    v-model="form.email"
                                    required
                                    autofocus
                                    autocomplete="username"
                                />
                                <InputError
                                    class="mt-2"
                                    :message="form.errors.email"
                                />
                            </div>
                            <div class="mt-4">
                                <div class="flex justify-between">
                                    <InputLabel
                                        class="font-bold"
                                        for="password"
                                        value="Password"
                                    />
                                    <Link
                                        v-if="canResetPassword"
                                        :href="route('password.request')"
                                        class="rounded-md text-sm text-gray-600 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:text-gray-400 dark:hover:text-gray-100 dark:focus:ring-offset-gray-800"
                                    >
                                        Lupa Password?
                                    </Link>
                                </div>
                                <TextInput
                                    id="password"
                                    type="password"
                                    class="mt-1 block w-full"
                                    v-model="form.password"
                                    required
                                    autocomplete="current-password"
                                />
                                <InputError
                                    class="mt-2"
                                    :message="form.errors.password"
                                />
                            </div>
                            <!-- <div class="mt-4 block">
                                <label class="flex items-center">
                                    <Checkbox
                                        name="remember"
                                        v-model:checked="form.remember"
                                    />
                                    <span
                                        class="ms-2 text-sm text-gray-600 dark:text-gray-400"
                                        >Remember me</span
                                    >
                                </label>
                            </div> -->
                            <div class="mt-4 text-sm font-bold">
                                Belum punya akun?
                                <Link
                                    :href="route('register')"
                                    class="text-primary hover:text-primary/80"
                                >
                                    Klik Disini
                                </Link>
                            </div>
                            <div class="mt-12 flex items-center justify-center">
                                <button
                                    class="justify-center bg-primary hover:bg-primary/80 text-center px-8 py-4 text-white rounded-full"
                                    :class="{ 'opacity-25': form.processing }"
                                    :disabled="form.processing"
                                >
                                    Log in
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </LoginLayout>
    </AppLayout>
</template>
