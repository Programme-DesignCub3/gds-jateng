<script setup lang="ts">
import MainHeader from "@/Components/MainHeader.vue";
import { Head, Link } from "@inertiajs/vue3";

import PrimaryButton from "@/Components/PrimaryButton.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import IconBackgroound from "@/Components/IconBackgroound.vue";

defineProps<{
  canLogin?: boolean;
  canRegister?: boolean;
  laravelVersion: string;
  phpVersion: string;
}>();
</script>

<template>
  <div class="relative">
    <!-- HALAMAN UTAMA -->
    <AppLayout>
      <Head title="Homepage" />

      <!-- MainHeader -->
      <MainHeader
        showJatengText
        bgImage="/assets/images/new/home.png"
        class="relative z-0 bg-primary bg-[length:150%] bg-center bg-no-repeat md:bg-[length:125%] lg:bg-[length:115%] xl:bg-[length:110%]"
      /> 

      <IconBackgroound />


      <!-- Konten -->
      <div class="container relative z-10 md:max-w-6xl sm:max-w-md max-w-sm pb-28 text-center pt-16">
        <div class="flex flex-col gap-6 text-xl">
          <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. <br>
Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
        </div>

        <div class="flex justify-center gap-x-4">
          <!-- <PrimaryButton as-child class="mt-20">
            <Link
              :href="$page.props.auth.user ? route('competition.index') : route('register')"
            >
              {{ $page.props.auth.user ? "Submission" : "Join Now" }}
            </Link>
          </PrimaryButton> -->
          <div as-child class="mt-20">
            <Link 
              :href="route('competition.index')" 
              class="bg-primary px-6 py-2 rounded-full text-white transform hover:bg-primary/60 ease-in-out"
            >
              More Info
            </Link>
          </div>
        </div>
      </div>

      
    </AppLayout>
  </div>
</template>




<style></style>
