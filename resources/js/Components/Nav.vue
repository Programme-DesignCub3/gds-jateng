<script setup lang="ts">
import {
  Activity,
  ArrowUpRight,
  CircleUser,
  CreditCard,
  DollarSign,
  LogOutIcon,
  Menu,
  Package2,
  Search,
  Settings,
  Settings2,
  User,
  Users,
} from "lucide-vue-next";
import { Avatar, AvatarFallback, AvatarImage } from "@/Components/ui/avatar";
import { Button } from "@/Components/ui/button";
import {
  Card,
  CardContent,
  CardDescription,
  CardHeader,
  CardTitle,
} from "@/Components/ui/card";
import {
  DropdownMenu,
  DropdownMenuContent,
  DropdownMenuGroup,
  DropdownMenuItem,
  DropdownMenuLabel,
  DropdownMenuSeparator,
  DropdownMenuTrigger,
} from "@/Components/ui/dropdown-menu";
import { Input } from "@/Components/ui/input";
import {
  Sheet,
  SheetContent,
  SheetDescription,
  SheetHeader,
  SheetTitle,
  SheetTrigger,
} from "@/Components/ui/sheet";
import {
  Table,
  TableBody,
  TableCell,
  TableHead,
  TableHeader,
  TableRow,
} from "@/Components/ui/table";
import ApplicationLogo from "./ApplicationLogo.vue";
import { PopoverTrigger } from "@/Components/ui/popover";
import NavLink from "./NavLink.vue";
import { Link } from "@inertiajs/vue3";
import { VisuallyHidden } from "radix-vue";
import DropdownMenuShortcut from "./ui/dropdown-menu/DropdownMenuShortcut.vue";
</script>

<template>
  <header class="sticky top-0 z-10 border-b bg-white">
    <header
      class="container flex h-16 items-center justify-between bg-background px-4 sm:h-auto md:px-6 lg:gap-20"
    >
      <nav
        class="hidden flex-col items-center justify-between gap-6 text-lg font-medium md:flex md:flex-row md:items-center md:gap-5 md:text-sm lg:w-full lg:gap-6"
      >
        <!-- nav item | desktop -->
        <NavLink :href="route('home')" active> Home </NavLink>
        <NavLink :href="route('test-upload.create')">
          Test upload
          <!-- Tentang Kompetisi -->
        </NavLink>
        <NavLink href="#"> Gallery Video </NavLink>
      </nav>
      <Sheet>
        <VisuallyHidden>
          <SheetHeader>
            <SheetTitle>Mobile Navigation</SheetTitle>
            <SheetDescription> Navigation on mobile </SheetDescription>
          </SheetHeader>
        </VisuallyHidden>
        <SheetTrigger as-child>
          <Button variant="outline" size="icon" class="shrink-0 md:hidden">
            <Menu class="h-5 w-5" />
            <span class="sr-only">Toggle navigation menu</span>
          </Button>
        </SheetTrigger>
        <SheetContent side="left">
          <nav class="grid gap-6 text-lg font-medium">
            <Link :href="route('home')" class="hover:text-foreground"> Home </Link>
            <Link
              :href="route('test-upload.create')"
              class="text-muted-foreground hover:text-foreground"
            >
              Test upload
            </Link>
            <Link href="#" class="text-muted-foreground hover:text-foreground">
              Gallery Video
            </Link>
            <Link
              :href="route('kompetisi')"
              class="text-muted-foreground hover:text-foreground"
            >
              Kompetisi
            </Link>
            <a href="#" class="text-muted-foreground hover:text-foreground">
              Pengumuman
            </a>
          </nav>
        </SheetContent>
      </Sheet>

      <!-- Logo -->
      <div
        class="shrink-0 basis-40 py-2 transition-transform duration-300 ease-in-out hover:-rotate-2 hover:scale-110 lg:basis-80"
      >
        <ApplicationLogo />
      </div>

      <!-- nav item | desktop -->
      <nav
        class="flex flex-col items-center justify-between gap-6 text-lg font-medium md:flex-row md:items-center md:gap-5 md:text-sm lg:w-full lg:gap-6"
      >
        <NavLink class="hidden md:inline-block" :href="route('kompetisi')">
          Kompetisi
        </NavLink>

        <NavLink class="hidden md:inline-block" href="#"> Pengumuman </NavLink>

        <DropdownMenu v-if="$page.props.auth.user">
          <DropdownMenuTrigger as-child>
            <Button variant="secondary" size="icon" class="rounded-full">
              <Avatar>
                <AvatarImage
                  src="https://github.com/bumpyy.png"
                  alt="Bumpyy the unmotivated"
                />
                <AvatarFallback>BP</AvatarFallback>
              </Avatar>
              <span class="sr-only">Toggle user menu</span>
            </Button>
          </DropdownMenuTrigger>
          <DropdownMenuContent class="w-56">
            <DropdownMenuLabel>
              <Link :href="route('dashboard')">Dashboard</Link>
            </DropdownMenuLabel>
            <DropdownMenuSeparator />
            <DropdownMenuGroup>
              <DropdownMenuItem disabled>
                <User class="mr-2 h-4 w-4" />
                <span>Profile</span>
              </DropdownMenuItem>
              <DropdownMenuItem>
                <Settings2 class="mr-2 h-4 w-4" />
                <Link :href="route('profile.edit')">
                  <span>Setting</span>
                </Link>
              </DropdownMenuItem>
            </DropdownMenuGroup>
            <DropdownMenuSeparator />
            <DropdownMenuItem>
              <LogOutIcon class="mr-2 h-4 w-4" />
              <Link :href="route('logout')" method="post" as="button">
                <span>Logout</span>
              </Link>
            </DropdownMenuItem>
          </DropdownMenuContent>
        </DropdownMenu>
        <Button v-else>
          <Link :href="route('register')"> Join </Link>
        </Button>
      </nav>
    </header>
  </header>
</template>

<style scoped></style>
