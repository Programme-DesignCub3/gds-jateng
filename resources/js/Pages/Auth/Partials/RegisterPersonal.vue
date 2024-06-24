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
  competition: "kolaborasa" | "chant" | "cheerleading" | "mascot";
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
  password: "",
  password_confirmation: "",
});

const submit = () => {
  form
    .transform((data) => ({
      ...data,
      phone_no: "+62" + data.phone_no,
    }))
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

      <!-- Alamat -->
      <div>
        <InputLabel for="alamat" value="Alamat" />
        <Textarea
          id="alamat"
          type="text"
          class="mt-1 block w-full"
          v-model="form.address"
          required
          autocomplete="alamat"
        />
        <InputError class="mt-2" :message="form.errors.name" />
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
          autocomplete="instagram_account"
        />
        <InputError class="mt-2" :message="form.errors.email" />
      </div>

      <!-- no telephon -->
      <div>
        <InputLabel for="phone_no" value="Nomor Telepon" />
        <div class="relative w-full max-w-sm items-center">
          <Input
            id="search"
            type="text"
            @keydown="isNumberKey"
            v-model="form.phone_no"
            placeholder="Nomor telepon anda"
            required
            class="pl-12"
          />
          <span class="absolute inset-y-0 start-0 flex items-center justify-center px-2">
            <span class="pr-2 text-sm text-muted-foreground">+62</span>
            <Separator orientation="vertical" />
          </span>
        </div>
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
          required
          autocomplete="username"
        />
        <InputError class="mt-2" :message="form.errors.email" />
      </div>

      <!-- Competition -->
      <div>
        <InputLabel for="competition" value="Kompetisi yang Diikuti" />
        <Select v-model="form.competition">
          <SelectTrigger>
            <SelectValue placeholder="Pilih kompetisi" />
          </SelectTrigger>
          <SelectContent>
            <SelectItem value="mascot">Mascot Design</SelectItem>
            <SelectItem value="cheerleading">Cheerleading Competition</SelectItem>
            <SelectItem value="chant">Chant Competition</SelectItem>
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
