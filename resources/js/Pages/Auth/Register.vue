<template>
  <AppLayout>
    <MainHeader />
    <Tabs default-value="school" class="container my-12 w-full max-w-lg">
      <TabsList class="grid w-full grid-cols-2">
        <TabsTrigger value="school">Daftar Sekolah </TabsTrigger>
        <TabsTrigger value="personal">Daftar Personal </TabsTrigger>
      </TabsList>

      <TabsContent value="school">
        <Card>
          <CardHeader>
            <CardTitle>Sekolah</CardTitle>
            <CardDescription>Daftar untuk Sekolah</CardDescription>
          </CardHeader>
          <CardContent class="space-y-2">
            <RegisterSchool />
          </CardContent>
        </Card>
      </TabsContent>

      <TabsContent value="personal">
        <Card>
          <CardHeader>
            <CardTitle>Personal</CardTitle>
            <CardDescription>Daftar untuk Personal</CardDescription>
          </CardHeader>
          <CardContent class="space-y-2">
            <RegisterPersonal />
          </CardContent>
        </Card>
      </TabsContent>
    </Tabs>
  </AppLayout>
</template>

<script setup lang="ts">
import AppLayout from "@/Layouts/AppLayout.vue";
import MainHeader from "@/Components/MainHeader.vue";
import { useForm } from "@inertiajs/vue3";

import {
  Card,
  CardContent,
  CardDescription,
  CardFooter,
  CardHeader,
  CardTitle,
} from "@/Components/ui/card";
import { Input } from "@/Components/ui/input";
import { Label } from "@/Components/ui/label";
import { Tabs, TabsContent, TabsList, TabsTrigger } from "@/Components/ui/tabs";
import RegisterPersonal from "./RegisterPersonal.vue";
import RegisterSchool from "./RegisterSchool.vue";

const form = useForm({
  name: "",
  position: "",
  instagramAccount: "",
  schoolName: "",
  area: "",
  phone: "",

  email: "",
  password: "",
  password_confirmation: "",
});

const submit = () => {
  form.post(route("register"), {
    onFinish: () => {
      form.reset("password", "password_confirmation");
    },
  });
};
</script>
