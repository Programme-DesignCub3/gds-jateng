<script setup lang="ts">
import { MenuIcon } from "lucide-vue-next";
import {
  Sheet,
  SheetClose,
  SheetContent,
  SheetDescription,
  SheetFooter,
  SheetHeader,
  SheetTitle,
  SheetTrigger,
} from "@/Components/ui/sheet";
import { Avatar, AvatarImage, AvatarFallback } from "@/Components/ui/avatar";
import { Link } from "@inertiajs/vue3";
import { Button } from "@/Components/ui/button";
</script>

<template>
  <!-- burger menu | mobile -->
  <div class="ml-auto lg:hidden">
    <Sheet>
      <SheetTrigger as-child>
        <Button variant="outline" size="icon">
          <MenuIcon class="size-8" />
        </Button>
      </SheetTrigger>
      <SheetContent>
        <SheetHeader class="flex flex-col gap-y-4">
          <SheetTitle>Menu</SheetTitle>
          <SheetDescription> Mobile menu</SheetDescription>
        </SheetHeader>
        <div class="flex flex-col items-end">
          <Link :href="route('home')"> Home </Link>

          <Link :href="route('test-upload.create')"> Test upload </Link>

          <Link href="#"> Gallery Video </Link>

          <Link :href="route('kompetisi')"> Kompetisi </Link>

          <Link href="#"> Pengumuman </Link>

          <div
            v-if="$page.props.auth.user"
            class="mt-8 flex items-end justify-end gap-4 max-xs:flex-col-reverse sm:items-center"
          >
            <div class="grid gap-1 text-end">
              <p class="text-sm font-medium leading-none">
                {{ $page.props.auth.user.name }}
              </p>
              <p class="text-sm text-muted-foreground">
                {{ $page.props.auth.user.email }}
              </p>
            </div>
            <Avatar>
              <AvatarImage src="https://github.com/bumpyy.png" alt="user profile photo" />
              <AvatarFallback>{{ $page.props.auth.user.name.charAt(0) }}</AvatarFallback>
            </Avatar>
          </div>
          <SheetClose v-else as-child>
            <Button as-child class="w-full px-4 py-2">
              <Link :href="route('register')"> Join </Link>
            </Button>
          </SheetClose>
        </div>
        <!-- <SheetFooter>
                                <SheetClose as-child>
                                    <Button type="s ubmit">
                                        Save changes
                                    </Button>
                                </SheetClose>
                            </SheetFooter> -->
      </SheetContent>
    </Sheet>
  </div>
</template>

<style scoped></style>
