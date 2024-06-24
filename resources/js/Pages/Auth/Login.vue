<script setup lang="ts">
import Checkbox from "@/Components/Checkbox.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import LoginLayout from "@/Layouts/LoginLayout.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";

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
        <LoginLayout bg-image="/assets/images/login.png">
            <Head title="Log in" />
            <div v-if="status" class="mb-4 text-sm font-medium text-green-600">
                {{ status }}
            </div>
            <div class="container w-full max-w-lg">
                <div class="mx-auto w-full max-w-sm fill-current text-gray-500">
                    <ApplicationLogo />
                </div>
                <div class="w-full">
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
                                    class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:text-gray-400 dark:hover:text-gray-100 dark:focus:ring-offset-gray-800"
                                >
                                    Forgot your password?
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
                        <div class="mt-4 block">
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
                        </div>
                        <div class="mt-4 flex items-center justify-end">
                            <PrimaryButton
                                class="w-full justify-center bg-primary text-center"
                                :class="{ 'opacity-25': form.processing }"
                                :disabled="form.processing"
                            >
                                Log in
                            </PrimaryButton>
                        </div>
                        <div class="mt-4 text-center text-sm font-bold">
                            Belum punya akun?
                            <Link
                                :href="route('register')"
                                class="underline decoration-primary"
                            >
                                Daftar
                            </Link>
                        </div>
                    </form>
                </div>
            </div>
        </LoginLayout>
    </AppLayout>
</template>
