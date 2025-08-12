<script setup lang="ts">
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

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
  address: string;
  position: string;
  instagram_account: string;
  school_name: string;
  area: string;
  phone_no: string;
  email: string;
  competition: string | undefined;
  password: string;
  password_confirmation: string;
}>({
  is_school_account: true,
  name: "",
  address: "",
  instagram_account: "",
  position: "",
  school_name: "",
  phone_no: "",
  area: "",
  email: "",
  competition: "",
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
          autocomplete="name"
        />
        <InputError class="mt-2" :message="form.errors.name" />
      </div>
      
      <div>
        <InputLabel for="address" value="Alamat" />
        <textarea
            id="address"
            class="mt-1 block w-full rounded-md border border-gray-600 bg-transparent px-3 py-2"
            v-model="form.address"
            required
            autofocus
            autocomplete="address"
            rows="4"
        ></textarea>
        <InputError class="mt-2" :message="form.errors.address" />
      </div>

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
        </div>
        <InputError class="mt-2" :message="form.errors.instagram_account" />
      </div>

      <div>
        <InputLabel for="phone_no" value="No. Telepon" />
        <div>
          <TextInput
            id="phone_no"
            type="tel"
            class="mt-1 block w-full"
            v-model="form.phone_no"
            @keydown="isNumberKey"
            required
            autocomplete="phone_no"
          />
        </div>
        <InputError class="mt-2" :message="form.errors.phone_no" />
      </div>

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
        </div>
        <InputError class="mt-2" :message="form.errors.email" />
      </div>

      <div>
        <InputLabel for="school_name" value="Asal sekolah" />
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


      <!-- Position name -->
      <!-- <div>
        <InputLabel for="position" value="Jabatan / Posisi" />
        <TextInput
          id="position"
          type="text"
          class="mt-1 block w-full"
          v-model="form.position"
          required
          autocomplete="position"
          placeholder="contoh: Pelatih/Osis/Siswa/Siswi"
        />
        <InputError class="mt-2" :message="form.errors.position" />
      </div> -->      

      <!-- Area -->
      <!-- <div>
        <InputLabel for="area" value="Pilihan area" />
        <Select v-model="form.area">
          <SelectTrigger>
            <SelectValue placeholder="Pilih area sekolah" />
          </SelectTrigger>
          <SelectContent>
            <SelectItem v-for="area in areas" :key="area.value" :value="area.value"
              >{{ area.label }}
            </SelectItem>
          </SelectContent>
        </Select>
        <InputError class="mt-2" :message="form.errors.area" />
      </div> -->      

      <!-- Competition -->
    <div>
        <InputLabel for="competition" value="Kompetisi yang Diikuti" class="bg-none" />
        <select
        id="competition"
        v-model="form.competition"
        required
        class="mt-1 block w-full rounded-md border border-gray-600 bg-transparent px-3 py-2"
        >
        <option disabled value="">Pilih kompetisi</option>
        <option value="modern-dance-competition">Moderrn Dance Competition</option>
        <option value="chant-supporter-competition">Chant Supporter Competition</option>
        <option value="kolaborasa">Kolaborasa</option>
        </select>
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
          requiredr
          autocomplete="new-password_confirmation"
        />
        <InputError class="mt-2" :message="form.errors.password_confirmation" />
      </div>

      <!-- sudah punya akun ? -->
      <div
        class="rounded-md text-sm font-bold text-gray-600 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:text-gray-400 dark:hover:text-gray-100 dark:focus:ring-offset-gray-800"
      >
        Sudah punya akun ?
        <Link :href="route('login')" class="text-primary font-bold"> klik disini </Link>
      </div>
    </div>

    <div class="mt-12 flex items-center justify-center">
      <button
        class="bg-primary px-5 py-2 hover:bg-primary/80 text-white rounded-full justify-center"
        :class="{ 'opacity-25': form.processing }"
        :disabled="form.processing"
      >
        Sign In
      </button>
    </div>
  </form>
</template>
