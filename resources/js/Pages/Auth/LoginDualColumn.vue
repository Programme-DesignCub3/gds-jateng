<template>
  <AuthLayout bgImage="">
    <Head title="Log in" />

    <form @submit.prevent="submit">
      <div v-if="status" class="mb-4 text-sm font-medium text-green-600">
        {{ status }}
      </div>

      <div class="grid gap-2 text-center">
        <h1 class="text-3xl font-bold">Login</h1>
        <p class="text-balance text-muted-foreground">
          Enter your email below to login to your account
        </p>
      </div>
      <!-- form -->
      <div class="grid gap-4">
        <!-- Email -->
        <div class="grid gap-2">
          <InputLabel for="email" value="Email" />

          <TextInput
            id="email"
            type="email"
            class="mt-1 block w-full"
            v-model="form.email"
            required
            autofocus
            autocomplete="username"
          />

          <InputError class="mt-2" :message="form.errors.email" />
        </div>

        <!-- password -->
        <div class="grid gap-2">
          <div class="flex items-center">
            <InputLabel for="password" value="Password" />

            <Link
              v-if="canResetPassword"
              :href="route('password.request')"
              class="ml-auto inline-block text-sm underline"
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

          <InputError class="mt-2" :message="form.errors.password" />
        </div>
        <label class="flex items-center">
          <Checkbox name="remember" v-model:checked="form.remember" />
          <span class="ms-2 text-sm text-gray-600">Remember me</span>
        </label>
        <PrimaryButton
          :disabled="form.processing"
          :class="{ 'opacity-25': form.processing }"
          type="submit"
          class="w-full justify-center"
        >
          Login
        </PrimaryButton>
      </div>
      <div class="mt-4 text-center text-sm">
        Belum punya akun?
        <Link href="#" class="underline"> Register </Link>
      </div>
    </form>
  </AuthLayout>
</template>

<script setup>
import Checkbox from "@/Components/Checkbox.vue";
// import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import AuthLayout from "@/Layouts/AuthLayout.vue";

defineProps({
  canResetPassword: {
    type: Boolean,
  },
  status: {
    type: String,
  },
});

const form = useForm({
  email: "",
  password: "",
  remember: false,
});

const submit = () => {
  form.post(route("login"), {
    onFinish: () => {
      console.log(form);

      form.reset("password");
    },
  });
};
</script>
