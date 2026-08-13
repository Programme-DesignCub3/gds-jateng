<script setup lang="ts">
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import LoginLogo from "@/Components/gds-2026/include/LoginLogo.vue";

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
      class="relative flex min-h-screen w-full items-center justify-center bg-center bg-cover bg-no-repeat bg-[url('/assets/images/gds-2026/home.png')] px-4 py-20 lg:py-10 overflow-hidden"
    >
      <div class="absolute inset-0 pointer-events-none select-none overflow-hidden z-0">
        <img
          src="/assets/images/gds-2026/elements/basket.png"
          alt="Basketball"
          class="absolute left-[12%] top-[12%] w-[8%] max-w-[90px] min-w-[40px]"
        />

        <img
          src="/assets/images/gds-2026/elements/nada.png"
          alt="Blue Music Note"
          class="absolute left-[58%] top-[10%] w-[4%] max-w-[45px] min-w-[20px]"
        />

        <img
          src="/assets/images/gds-2026/elements/buku.png"
          alt="Book"
          class="absolute right-[12%] top-[10%] w-[6%] max-w-[70px] min-w-[30px]"
        />

        <img
          src="/assets/images/gds-2026/elements/lightning-red.png"
          alt="Red Flash"
          class="absolute left-[39%] top-[23%] w-[3%] max-w-[35px] min-w-[18px]"
        />

        <img
          src="/assets/images/gds-2026/elements/blue-arrow.png"
          alt="Blue Arrow"
          class="absolute left-[3%] top-[40%] w-[4%] max-w-[45px] min-w-[20px]"
        />

        <img
          src="/assets/images/gds-2026/elements/lightning-yellow.png"
          alt="Yellow Flash"
          class="absolute left-[46%] top-[43%] w-[3%] max-w-[35px] min-w-[18px]"
        />

        <img
          src="/assets/images/gds-2026/elements/gamepad.png"
          alt="Gamepad"
          class="absolute left-[7%] bottom-[12%] w-[9%] max-w-[100px] min-w-[45px]"
        />

        <img
          src="/assets/images/gds-2026/elements/lightning-yellow.png"
          alt="Yellow Flash"
          class="absolute left-[20%] bottom-[8%] w-[3%] max-w-[35px] min-w-[18px]"
        />

        <img
          src="/assets/images/gds-2026/elements/lukis.png"
          alt="Paint Palette"
          class="absolute left-[40%] bottom-[8%] w-[10%] max-w-[110px] min-w-[50px]"
        />

        <img
          src="/assets/images/gds-2026/elements/lightning-red.png"
          alt="Red Flash"
          class="absolute right-[33%] bottom-[12%] w-[3%] max-w-[35px] min-w-[18px]"
        />

        <img
          src="/assets/images/gds-2026/elements/drum.png"
          alt="Drum"
          class="absolute right-[5%] bottom-[3%] w-[10%] max-w-[110px] min-w-[50px]"
        />
      </div>

      <div class="relative z-10 grid w-full max-w-6xl items-center justify-center gap-8 xl:grid-cols-2">
        <!-- Kolom Kiri: Logo -->
        <div class="flex w-full items-center justify-center p-4">
          <LoginLogo class="h-auto w-full max-w-md object-contain xl:max-w-xl" />
        </div>

        <!-- Kolom Kanan: Form Login -->
        <div class="flex w-full flex-col items-center justify-center p-2 sm:p-4">
          <div v-if="status" class="mb-4 text-sm font-medium text-green-600">
            {{ status }}
          </div>

          <div class="relative w-full max-w-lg">
            <div
              class="relative rounded-[2rem] bg-[#fff3df] px-6 py-10 shadow-kaku-login md:px-10 md:py-12"
            >
              <div class="mb-8 w-full">
                <h1
                  class="text-sticker select-none text-center font-black uppercase leading-none tracking-tighter text-3xl md:text-5xl"
                >
                  LOGIN
                </h1>
              </div>

              <div class="font-montserrat w-full font-bold">
                <form @submit.prevent="submit">
                  <div>
                    <InputLabel
                      class="text-base font-bold md:text-lg"
                      for="email"
                      value="Email"
                    />
                    <TextInput
                      id="email"
                      type="email"
                      class="mt-2 block w-full rounded-lg border-2 border-black bg-[#fbf7f1] px-4 py-3 text-base focus:border-red-500 focus:ring-red-500 md:text-lg"
                      v-model="form.email"
                      required
                      autofocus
                      autocomplete="username"
                    />
                    <InputError class="mt-2" :message="form.errors.email" />
                  </div>

                  <div class="mt-6">
                    <div class="mb-2 flex items-baseline justify-between">
                      <InputLabel
                        class="text-base font-bold md:text-lg"
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
                      class="mt-2 block w-full rounded-lg border-2 border-black bg-[#fbf7f1] px-4 py-3 text-base focus:border-red-500 focus:ring-red-500 md:text-lg"
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
                      class="ml-1 font-bold text-red-600 hover:text-red-800"
                    >
                      Klik Disini
                    </Link>
                  </div>

                  <div class="mt-8 flex items-center justify-center">
                    <button
                      type="submit"
                      class="font-changa w-auto rounded-full bg-red-600 px-10 py-3 text-center font-extrabold text-white transition-colors duration-200 hover:bg-red-700 text-base md:text-lg"
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