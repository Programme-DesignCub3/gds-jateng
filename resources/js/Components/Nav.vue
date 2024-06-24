<script setup lang="ts">
import { LogOutIcon, Menu, Settings2, User } from "lucide-vue-next";
import { Avatar, AvatarFallback, AvatarImage } from "@/Components/ui/avatar";
import { Button } from "@/Components/ui/button";

import {
    DropdownMenu,
    DropdownMenuContent,
    DropdownMenuGroup,
    DropdownMenuItem,
    DropdownMenuSeparator,
    DropdownMenuTrigger,
} from "@/Components/ui/dropdown-menu";
import {
    Sheet,
    SheetContent,
    SheetDescription,
    SheetHeader,
    SheetTitle,
    SheetTrigger,
} from "@/Components/ui/sheet";

import ApplicationLogo from "./ApplicationLogo.vue";
import NavLink from "./NavLink.vue";
import { Link } from "@inertiajs/vue3";
import { VisuallyHidden } from "radix-vue";
import { getInitials } from "@/lib/utils";

defineProps<{
    fixedNav: boolean;
}>();
</script>

<template>
    <header
        class="top-0 z-10 border-b bg-white"
        :class="{ sticky: !fixedNav, 'fixed w-full': fixedNav }"
    >
        <div
            class="container flex h-16 items-center justify-between bg-background px-4 sm:h-auto md:px-6 lg:gap-20"
        >
            <nav
                class="hidden flex-col items-center justify-between gap-6 text-lg font-medium md:flex md:flex-row md:items-center md:gap-5 md:text-sm lg:w-full lg:gap-6"
            >
                <!-- nav item | desktop -->
                <NavLink
                    :active="route().current('home')"
                    :href="route('home')"
                >
                    Home
                </NavLink>

                <NavLink
                    :active="route().current('test-upload.create')"
                    :href="route('test-upload.create')"
                >
                    Test upload
                    <!-- Tentang Kompetisi -->
                </NavLink>

                <NavLink href="#"> Gallery Video </NavLink>
            </nav>

            <!-- mobile nav -->
            <Sheet>
                <VisuallyHidden>
                    <SheetHeader>
                        <SheetTitle>Mobile Navigation</SheetTitle>
                        <SheetDescription>
                            Navigation on mobile
                        </SheetDescription>
                    </SheetHeader>
                </VisuallyHidden>
                <SheetTrigger as-child>
                    <Button
                        variant="outline"
                        size="icon"
                        class="shrink-0 md:hidden"
                    >
                        <Menu class="h-5 w-5" />
                        <span class="sr-only">Toggle navigation menu</span>
                    </Button>
                </SheetTrigger>
                <SheetContent side="left">
                    <VisuallyHidden>
                        <SheetHeader>
                            <SheetTitle>Mobile navigation item list</SheetTitle>
                            <SheetDescription>
                                list of nav item
                            </SheetDescription>
                        </SheetHeader>
                    </VisuallyHidden>
                    <nav class="grid gap-6 text-lg font-medium">
                        <Link
                            :href="route('home')"
                            class="hover:text-foreground"
                        >
                            Home
                        </Link>
                        <Link
                            :href="route('test-upload.create')"
                            class="text-muted-foreground hover:text-foreground"
                        >
                            Test upload
                        </Link>
                        <Link
                            href="#"
                            class="text-muted-foreground hover:text-foreground"
                        >
                            Gallery Video
                        </Link>
                        <Link
                            :href="route('competition.index')"
                            class="text-muted-foreground hover:text-foreground"
                        >
                            Kompetisi
                        </Link>
                        <Link
                            :href="route('announcement')"
                            class="text-muted-foreground hover:text-foreground"
                        >
                            Pengumuman
                        </Link>
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
                <NavLink
                    :active="route().current('competition.*')"
                    class="hidden md:inline-block"
                    :href="route('competition.index')"
                >
                    Kompetisi
                </NavLink>

                <NavLink
                    class="hidden md:inline-block"
                    :href="route('announcement')"
                >
                    Pengumuman
                </NavLink>

                <DropdownMenu v-if="$page.props.auth.user">
                    <DropdownMenuTrigger as-child>
                        <Button
                            variant="secondary"
                            size="icon"
                            class="rounded-full"
                        >
                            <Avatar>
                                <AvatarImage
                                    src=""
                                    alt="Bumpyy the unmotivated"
                                />
                                <AvatarFallback class="uppercase">
                                    {{
                                        getInitials($page.props.auth.user.name)
                                    }}
                                </AvatarFallback>
                            </Avatar>
                            <span class="sr-only">Toggle user menu</span>
                        </Button>
                    </DropdownMenuTrigger>
                    <DropdownMenuContent class="w-56">
                        <DropdownMenuGroup>
                            <DropdownMenuItem as-child>
                                <Link :href="route('dashboard')">
                                    <User class="mr-2 h-4 w-4" />
                                    <span>Dashboard</span>
                                </Link>
                            </DropdownMenuItem>
                            <DropdownMenuItem as-child>
                                <Link :href="route('profile.edit')">
                                    <Settings2 class="mr-2 h-4 w-4" />
                                    <span>Setting</span>
                                </Link>
                            </DropdownMenuItem>
                        </DropdownMenuGroup>

                        <DropdownMenuSeparator />

                        <DropdownMenuItem>
                            <LogOutIcon class="mr-2 h-4 w-4" />
                            <Link
                                :href="route('logout')"
                                method="post"
                                as="button"
                            >
                                <span>Logout</span>
                            </Link>
                        </DropdownMenuItem>
                    </DropdownMenuContent>
                </DropdownMenu>
                <Button v-else>
                    <Link :href="route('login')"> Join </Link>
                </Button>
            </nav>
        </div>
    </header>
</template>

<style scoped></style>
