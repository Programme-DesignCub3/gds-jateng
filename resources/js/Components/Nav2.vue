<template>
  <nav class="bg-white shadow">
    <div class="container mx-auto w-full px-4">
      <div class="flex items-center justify-center py-4 lg:gap-x-10">
        <!-- nav item | desktop -->
        <div class="hidden w-full items-center justify-between lg:flex">
          <NavLink :href="route('home')" active> Home </NavLink>

          <NavLink :href="route('test-upload.create')">
            Test upload
            <!-- Tentang Kompetisi -->
          </NavLink>

          <NavLink href="#"> Gallery Video </NavLink>
        </div>

        <!-- logo -->
        <div
          class="shrink-0 basis-40 transition-transform duration-300 ease-in-out hover:-rotate-2 hover:scale-110 max-lg:ml-auto lg:basis-80"
        >
          <ApplicationLogo />
        </div>

        <!-- nav item | desktop -->
        <div class="hidden w-full items-center justify-between lg:flex">
          <NavLink :href="route('kompetisi')"> Kompetisi </NavLink>

          <NavLink href="#"> Pengumuman </NavLink>

          <Popover v-if="$page.props.auth.user">
            <PopoverTrigger class="cursor-pointer" as-child>
              <Avatar>
                <AvatarImage
                  src="https://github.com/bumpyy.png"
                  alt="Bumpyy the unmotivated"
                />
                <AvatarFallback>BP</AvatarFallback>
              </Avatar>
            </PopoverTrigger>
            <PopoverContent class="mr-4 mt-2 w-fit text-end">
              <NavLink :href="route('dashboard')"> Dashboard </NavLink>
            </PopoverContent>
          </Popover>

          <Button v-else as-child>
            <Link :href="route('register')"> Join </Link>
          </Button>
        </div>

        <MobileNav />
      </div>
    </div>
  </nav>
</template>

<script setup lang="ts">
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import NavLink from "@/Components/NavLink.vue";
import MobileNav from "@/Components/MobileNav.vue";
import { Link } from "@inertiajs/vue3";
import { Button } from "@/Components/ui/button";
import { Popover, PopoverContent, PopoverTrigger } from "@/Components/ui/popover";
import { Avatar, AvatarImage, AvatarFallback } from "@/Components/ui/avatar";
</script>

<style scoped></style>
