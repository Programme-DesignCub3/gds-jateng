<script setup lang="ts">
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";

defineProps<{
  status?: string;
}>();

const form = useForm({
  email: "",
});

const submit = () => {
  form.post(route("password.email"));
};
</script>

<template>
  <AppLayout fixed-nav>
    <Head title="Lupa Password" />

    <div
      class="relative flex min-h-screen w-full flex-col justify-center items-center bg-no-repeat bg-cover bg-center px-4 py-12"
      style="background-image: url('/assets/images/gds-2026/short-bg.png');"
    >
      <div v-if="status" class="mb-4 text-sm font-medium text-green-600">
        {{ status }}
      </div>

      <div class="relative w-full max-w-xl p-12">
        <div
          class="bg-[#fff3df] px-8 py-12 md:px-12 md:py-16 rounded-[2rem] shadow-kaku-forgot relative"
        >
          <div class="w-full mb-6 text-center">
            <h1
              class="text-3xl md:text-5xl font-extrabold tracking-tight leading-none text-shadow-kaku font-changa text-black"
            >
              LUPA PASSWORD
            </h1>
          </div>

          <div class="mb-6 text-sm md:text-base font-bold text-gray-700 font-montserrat text-center">
            Forgot your password? No problem. Just let us know your email
                    address and we will email you a password reset link that will
                    allow you to choose a new one.
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
                  placeholder="Masukkan email Anda"
                />
                <InputError class="mt-2" :message="form.errors.email" />
              </div>

              <div class="mt-8 flex flex-col items-center justify-center gap-4">
                <button
                  type="submit"
                  class="w-auto bg-red-600 hover:bg-red-700 text-center px-8 py-3 text-sm md:text-lg font-changa text-white rounded-full transition-colors duration-200"
                  :class="{ 'opacity-25': form.processing }"
                  :disabled="form.processing"
                >
                  KIRIM LINK RESET
                </button>

                <Link
                  :href="route('login')"
                  class="text-sm font-bold text-red-600 hover:text-red-800 transition-colors"
                >
                  Kembali ke Halaman Login
                </Link>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </AppLayout>
</template>

<style scoped>
.shadow-kaku-forgot {
  box-shadow: 12px 12px 0px rgba(220, 38, 38, 1);
}

.text-shadow-kaku {
  text-shadow: 3px 3px 0px rgba(220, 38, 38, 1);
}
</style>