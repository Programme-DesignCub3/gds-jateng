<script setup lang="ts">
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import { Input } from "@/Components/ui/input";
import { Separator } from "@/Components/ui/separator";
import {
  Select,
  SelectContent,
  SelectItem,
  SelectTrigger,
  SelectValue,
} from "@/Components/ui/select";
import { useNumberKeydown } from "@/lib/utils";

const { isNumberKey } = useNumberKeydown();
const areas: { label: string; value: string }[] = [
  { label: "Yogyakarta", value: "yogyakarta" },
  { label: "Semarang", value: "semarang" },
];

const form = useForm<{
  is_school_account: true;
  name: string;
  position: string;
  instagram_account: string;
  school_name: string;
  area: string;
  phone_no: string;
  email: string;
  competition: "chants" | "cheerleading" | "mascot-design";
  password: string;
  password_confirmation: string;
}>({
  is_school_account: true,
  name: "",
  instagram_account: "",
  position: "",
  school_name: "",
  phone_no: "",
  area: "",
  email: "",
  competition: "mascot-design",
  password: "",
  password_confirmation: "",
});

const submit = () => {
  form
    // .transform((data) => ({
    //   ...data,
    //   phone_no: "+62" + data.phone_no,
    // }))
    .post(route("register"), {
      onFinish: () => {
        form.reset("password", "password_confirmation");
      },
    });
};
</script>

<template>
  <Head title="Register Personal" />

  <form @submit.prevent="submit">
    <!-- Name -->
    <div class="space-y-4">
      <div>
        <InputLabel for="name" value="Nama Perwakilan" />
        <TextInput
          id="name"
          type="text"
          class="mt-1 block w-full"
          v-model="form.name"
          required
          autofocus
          autocomplete="name"
        />
        <InputError class="mt-2" :message="form.errors.name" />
      </div>

      <!-- Position name -->
      <div>
        <InputLabel for="position" value="Jabatan / Posisi" />
        <TextInput
          id="position"
          type="text"
          class="mt-1 block w-full"
          v-model="form.position"
          required
          autocomplete="position"
        />
        <InputError class="mt-2" :message="form.errors.position" />
      </div>

      <!-- School name -->
      <div>
        <InputLabel for="school_name" value="Nama sekolah" />
        <TextInput
          id="school_name"
          type="text"
          class="mt-1 block w-full"
          v-model="form.school_name"
          required
          autocomplete="school_name"
        />
        <InputError class="mt-2" :message="form.errors.school_name" />
      </div>

      <!-- Area -->
      <div>
        <InputLabel for="area" value="Pilihan area" />
        <Select v-model="form.area">
          <SelectTrigger>
            <SelectValue placeholder="Pilih area sekolah" />
          </SelectTrigger>
          <SelectContent>
            <SelectItem v-for="area in areas" :key="area.value" :value="area.value">{{
              area.label
            }}</SelectItem>
          </SelectContent>
        </Select>
        <InputError class="mt-2" :message="form.errors.area" />
      </div>

      <!-- Akun Instagram -->
      <div>
        <InputLabel for="instagram_account" value="Akun Instagram" />
        <div>
          <TextInput
            id="instagram_account"
            type="text"
            class="mt-1 block w-full"
            v-model="form.instagram_account"
            required
            autocomplete="instagram_account"
          />
          <p class="mt-1 text-xs text-muted-foreground dark:text-red-400">
            *Akun Instagram yang mewakili sekolah
          </p>
        </div>
        <InputError class="mt-2" :message="form.errors.instagram_account" />
      </div>

      <!-- no telephon with icon-->
      <!-- <div>
        <InputLabel for="phone_no" value="Nomor Telepon" />
        <div class="relative w-full max-w-sm items-center">
          <Input
            id="phone_no"
            type="tel"
            @keydown="handlePhoneInput"
            v-model="form.phone_no"
            required
            placeholder="Nomor telepon perwakilan"
            class="pl-12"
          />
          <span class="absolute inset-y-0 start-0 flex items-center justify-center px-2">
            <span class="pr-2 text-sm text-muted-foreground">+62</span>
            <Separator orientation="vertical" />
          </span>
        </div>
        <InputError class="mt-2" :message="form.errors.phone_no" />
      </div> -->

      <!-- no telephon -->
      <div>
        <InputLabel for="phone_no" value="Nomor Telepon" />
        <div>
          <TextInput
            id="phone_no"
            type="tel"
            class="mt-1 block w-full"
            v-model="form.phone_no"
            placeholder="ex: 082312553331"
            @keydown="isNumberKey"
            required
            autocomplete="phone_no"
          />
          <p class="mt-1 text-xs text-muted-foreground dark:text-red-400">
            *Nomor telepon perwakilan
          </p>
        </div>
        <InputError class="mt-2" :message="form.errors.instagram_account" />
      </div>

      <!-- email -->
      <div class="mt-4">
        <InputLabel for="email" value="Email" />
        <div>
          <TextInput
            id="email"
            type="email"
            class="mt-1 block w-full"
            v-model="form.email"
            required
            autocomplete="username"
          />
          <p class="mt-1 text-xs text-muted-foreground dark:text-red-400">
            *masukkan email sekolah/perwakilan
          </p>
        </div>
        <InputError class="mt-2" :message="form.errors.email" />
      </div>

      <!-- Competition -->
      <div>
        <InputLabel for="competition" value="Kompetisi yang Diikuti" />
        <Select v-model="form.competition" required>
          <SelectTrigger>
            <SelectValue placeholder="Pilih kompetisi" />
          </SelectTrigger>
          <SelectContent>
            <SelectItem value="mascot-design">Mascot Design</SelectItem>
            <SelectItem value="cheerleading">Cheerleading Competition</SelectItem>
            <SelectItem value="chants">Chant Competition</SelectItem>
          </SelectContent>
        </Select>
        <InputError class="mt-2" :message="form.errors.competition" />
      </div>

      <!-- Password -->
      <div>
        <InputLabel for="password" value="Password" />
        <TextInput
          id="password"
          type="password"
          class="mt-1 block w-full"
          v-model="form.password"
          required
          autocomplete="new-password"
        />
        <InputError class="mt-2" :message="form.errors.password" />
      </div>

      <!-- Password Confirmation-->
      <div>
        <InputLabel for="password_confirmation" value="Konfirmasi Password" />
        <TextInput
          id="password_confirmation"
          type="password"
          class="mt-1 block w-full"
          v-model="form.password_confirmation"
          required
          autocomplete="new-password_confirmation"
        />
        <InputError class="mt-2" :message="form.errors.password_confirmation" />
      </div>

      <!-- sudah punya akun ? -->
      <div
        class="rounded-md text-sm text-gray-600 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:text-gray-400 dark:hover:text-gray-100 dark:focus:ring-offset-gray-800"
      >
        Sudah punya akun ?
        <Link :href="route('login')" class="text-primary underline"> klik disini </Link>
      </div>
    </div>

    <div class="mt-12 flex items-center justify-center">
      <PrimaryButton
        class="ms-4"
        :class="{ 'opacity-25': form.processing }"
        :disabled="form.processing"
      >
        Register
      </PrimaryButton>
    </div>
  </form>
</template>
