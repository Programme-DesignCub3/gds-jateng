<script setup lang="ts">
import AppLayout from "@/Layouts/AppLayout.vue";
import MainHeader from "@/Components/MainHeader.vue";

import {
    Card,
    CardContent,
    CardDescription,
    CardHeader,
    CardTitle,
} from "@/Components/ui/card";
import { Tabs, TabsContent, TabsList, TabsTrigger } from "@/Components/ui/tabs";
import RegisterPersonal from "./RegisterPersonal.vue";
import RegisterSchool from "./RegisterSchool.vue";
import { ref } from "vue";

type TRegistrationType = "sekolah" | "pribadi";

const selectedRegistration = ref<TRegistrationType>("sekolah");
</script>

<template>
    <AppLayout>
        <MainHeader :showJatengText="true" />
        <div class="container mb-12 w-full max-w-lg">
            <h1 class="mb-4 text-center text-4xl uppercase">
                Registrasi {{ selectedRegistration }}
            </h1>
            <Tabs
                @update:modelValue="
                    (e) => {
                        selectedRegistration = e as TRegistrationType;
                    }
                "
                default-value="sekolah"
            >
                <TabsList class="grid w-full grid-cols-2">
                    <TabsTrigger value="sekolah">Daftar Sekolah </TabsTrigger>
                    <TabsTrigger value="pribadi">Daftar Pribadi </TabsTrigger>
                </TabsList>
                <TabsContent value="sekolah">
                    <Card>
                        <CardHeader>
                            <CardTitle>Sekolah</CardTitle>
                            <CardDescription
                                >Daftar untuk Sekolah</CardDescription
                            >
                        </CardHeader>
                        <CardContent class="space-y-2">
                            <RegisterSchool />
                        </CardContent>
                    </Card>
                </TabsContent>
                <TabsContent value="pribadi">
                    <Card>
                        <CardHeader>
                            <CardTitle>Pribadi</CardTitle>
                            <CardDescription
                                >Daftar untuk Pribadi</CardDescription
                            >
                        </CardHeader>
                        <CardContent class="space-y-2">
                            <RegisterPersonal />
                        </CardContent>
                    </Card>
                </TabsContent>
            </Tabs>
        </div>
    </AppLayout>
</template>
