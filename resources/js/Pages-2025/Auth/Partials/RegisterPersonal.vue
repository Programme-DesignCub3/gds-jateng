<script setup lang="ts">
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import { Textarea } from "@/Components/ui/textarea";
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

const form = useForm<{
  is_school_account: false;
  name: string;
  address: string;
  instagram_account: string;
  phone_no: string;
  email: string;
  competition: "kolaborasa";
  school_name: string;
  password: string;
  password_confirmation: string;
}>({
  is_school_account: false,
  name: "",
  address: "",
  instagram_account: "",
  phone_no: "",
  email: "",
  competition: "kolaborasa",
  school_name: "",
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
        <InputLabel for="name" value="Nama" />
        <TextInput
          id="name"
          type="text"
          class="mt-1 block w-full"
          v-model="form.name"
          required
          autofocus
          placeholder="contoh: Reki"
          autocomplete="name"
        />
        <InputError class="mt-2" :message="form.errors.name" />
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
          placeholder="contoh: SMA 1 Yogyakarta"
        />
        <InputError class="mt-2" :message="form.errors.school_name" />
      </div>

      <!-- Alamat -->
      <div>
        <InputLabel for="alamat" value="Alamat" />
        <Textarea
          id="alamat"
          type="text"
          class="mt-1 block w-full"
          v-model="form.address"
          required
          placeholder="contoh: Jl. Mawar No. 123, Jakarta"
          autocomplete="alamat"
        />
        <InputError class="mt-2" :message="form.errors.address" />
      </div>

      <!-- Akun Instagram -->
      <div>
        <InputLabel for="instagram_account" value="Akun Instagram" />
        <TextInput
          id="instagram_account"
          type="text"
          class="mt-1 block w-full"
          v-model="form.instagram_account"
          required
          placeholder="@nama_user"
          autocomplete="instagram_account"
        />
        <InputError class="mt-2" :message="form.errors.instagram_account" />
      </div>

      <!-- Phone number -->
      <div>
        <InputLabel for="phone_no" value="Nomor Telepon" />
        <!-- <div> -->
        <TextInput
          id="phone_no"
          type="tel"
          class="mt-1 block w-full"
          @keydown="isNumberKey"
          v-model="form.phone_no"
          placeholder="contoh: 082312553331"
          required
          autocomplete="phone_no"
        />
        <!-- <p class="mt-1 text-xs text-muted-foreground dark:text-red-400">
            *Nomor telepon perwakilan
          </p> -->
        <!-- </div> -->
        <InputError class="mt-2" :message="form.errors.phone_no" />
      </div>

      <!-- email -->
      <div class="mt-4">
        <InputLabel for="email" value="Email" />
        <TextInput
          id="email"
          type="email"
          class="mt-1 block w-full"
          v-model="form.email"
          placeholder="contoh@email.com"
          required
          autocomplete="username"
        />
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
            <SelectItem value="kolaborasa">Kolaborasa</SelectItem>
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
