<script setup lang="ts">
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import MainHeaderHome from "@/Components/gds-2026/home/MainHeaderHome.vue";

defineProps<{
  canResetPassword?: boolean;
  status?: string;
  bgImage?: string;
}>();

const form = useForm({
  email: "",
  password: "",
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
    <Head title="Log in" />
    <div
        class="relative flex min-h-screen w-full flex-col justify-center items-center bg-no-repeat pt-20 xl:grid xl:grid-cols-2 xl:pt-0 bg-cover bg-[left_center]"
        style="background-image: url('assets/images/gds-2026/short-bg.png');"
        >
      <div class="w-full relative flex justify-center items-center p-6">
        <MainHeaderHome class="w-full h-auto object-contain max-w-lg xl:max-w-xl" />
      </div>

      <div class="w-full flex flex-col items-center justify-center p-12">
        <div v-if="status" class="mb-4 text-sm font-medium text-green-600">
          {{ status }}
        </div>

        <div class="relative w-full max-w-xl">
          <div
            class="bg-[#fff3df] px-8 py-12 md:px-12 md:py-16 rounded-[2rem] shadow-kaku-login relative"
          >
            <div class="w-full mb-10">
              <h1
                class="text-3xl md:text-6xl font-extrabold tracking-tight text-center leading-none text-shadow-kaku font-changa" 
              >
                LOGIN
              </h1>
            </div>

            <div class="w-full font-bold font-montserrat">
              <form @submit.prevent="submit">
                <div>
                  <InputLabel
                    class="font-bold text-lg"
                    for="email"
                    value="Email"
                  />
                  <TextInput
                    id="email"
                    type="email"
                    class="mt-2 block w-full text-lg px-4 py-3 border-2 border-black rounded-lg bg-[#fbf7f1] focus:border-red-500 focus:ring-red-500"
                    v-model="form.email"
                    required
                    autofocus
                    autocomplete="username"
                  />
                  <InputError class="mt-2" :message="form.errors.email" />
                </div>

                <div class="mt-6">
                  <div class="flex justify-between items-baseline mb-2">
                    <InputLabel
                      class="font-bold text-lg"
                      for="password"
                      value="Password"
                    />
                    <Link
                      v-if="canResetPassword"
                      :href="route('password.request')"
                      class="text-sm text-red-600 hover:text-red-800 focus:outline-none focus:ring-2 focus:ring-red-500 rounded"
                    >
                      Lupa Password?
                    </Link>
                  </div>
                  <TextInput
                    id="password"
                    type="password"
                    class="mt-2 block w-full text-lg px-4 py-3 border-2 border-black rounded-lg bg-[#fbf7f1] focus:border-red-500 focus:ring-red-500"
                    v-model="form.password"
                    required
                    autocomplete="current-password"
                  />
                  <InputError class="mt-2" :message="form.errors.password" />
                </div>

                <div class="mt-6 text-sm">
                  <span>Belum punya akun?</span>
                  <Link
                    :href="route('register')"
                    class="text-red-600 hover:text-red-800 ml-1 font-bold"
                  >
                    Klik Disini
                  </Link>
                </div>

                <div class="mt-10 flex items-center justify-center">
                  <button
                    type="submit"
                    class="w-auto bg-red-600 hover:bg-red-700 text-center px-10 py-3 text-sm md:text-lg font-extrabold font-changa text-white rounded-full transition-colors duration-200"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                  >
                    LOGIN
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AppLayout>
</template>

<style scoped>
.shadow-kaku-login {
  box-shadow: 12px 12px 0px rgba(220, 38, 38, 1);
}

.text-shadow-kaku {
  text-shadow: 3px 3px 0px rgba(220, 38, 38, 1);
}
</style>