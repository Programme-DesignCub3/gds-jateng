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
import GoodChallengeLogo from "./GoodChallengeLogo.vue";
import { ref } from "vue";

const useGdsLogo = ref<boolean>(true);

const handleChangeLogo = () => {
    useGdsLogo.value = !useGdsLogo.value;
};

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
            class="container flex h-16 grid-cols-[37%_1fr_37%] items-center justify-between bg-background px-4 sm:h-auto md:grid md:px-6 lg:gap-4 lg:text-lg"
        >
            <nav
                class="hidden grid-cols-3 content-center items-center justify-between justify-items-center gap-6 font-medium md:grid md:gap-5 lg:w-full lg:gap-6"
            >
                <!-- nav item | desktop -->
                <NavLink
                    class="col-start-2"
                    :active="route().current('home')"
                    :href="route('home')"
                >
                    Home
                </NavLink>

                <NavLink
                    :href="route('competition.index')"
                    :active="route().current('competition.*')"
                    class="text-muted-foreground hover:text-foreground"
                >
                    Kompetisi
                </NavLink>
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

                    <GoodChallengeLogo class="mx-auto my-4 mb-12 w-4/5 px-8" />

                    <nav class="grid gap-6 text-lg font-medium">
                        <Link
                            :href="route('home')"
                            class="hover:text-foreground"
                            :class="{
                                'text-muted-foreground':
                                    !route().current('home'),
                            }"
                        >
                            Home
                        </Link>

                        <Link
                            :href="route('competition.index')"
                            :active="route().current('competition.*')"
                            class="hover:text-foreground"
                            :class="{
                                'text-muted-foreground':
                                    !route().current('competition.*'),
                            }"
                        >
                            Kompetisi
                        </Link>

                        <p
                            class="cursor-not-allowed text-muted-foreground hover:text-foreground"
                        >
                            Pengumuman
                        </p>
                    </nav>
                </SheetContent>
            </Sheet>

            <!-- Logo -->
            <div
                @mouseenter="handleChangeLogo"
                @mouseleave="handleChangeLogo"
                class="relative shrink-0 basis-40 py-2 transition-transform duration-300 ease-in-out hover:-rotate-2 hover:scale-110 md:basis-20 lg:basis-80"
            >
                <ApplicationLogo
                    class="transition-all duration-500"
                    :class="{
                        '-rotate-180 scale-0 opacity-0': !useGdsLogo,
                    }"
                />
                <GoodChallengeLogo
                    class="absolute top-1/2 w-full -translate-y-1/2 px-6 transition-all duration-500 md:px-12"
                    :class="{
                        'rotate-180 scale-0 opacity-0': useGdsLogo,
                    }"
                />
            </div>

            <!-- nav item | desktop -->
            <nav
                class="flex grid-cols-3 content-center items-center justify-between justify-items-center gap-6 font-medium md:grid md:gap-5 lg:w-full lg:gap-6"
            >
                <p
                    class="hidden cursor-not-allowed text-muted-foreground md:inline-block"
                >
                    Pengumuman
                </p>

                <DropdownMenu v-if="$page.props.auth.user">
                    <DropdownMenuTrigger as-child>
                        <Button
                            variant="secondary"
                            size="icon"
                            class="rounded-full"
                        >
                            <Avatar>
                                <AvatarImage src="" alt="Profile picture" />
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
                            <DropdownMenuItem as-child> </DropdownMenuItem>
                            <DropdownMenuItem as-child>
                                <Link :href="route('profile.edit')">
                                    <Settings2 class="mr-2 h-4 w-4" />
                                    <span>Setting</span>
                                </Link>
                            </DropdownMenuItem>
                        </DropdownMenuGroup>

                        <DropdownMenuSeparator />

                        <DropdownMenuItem as-child>
                            <Link
                                class="inline-flex w-full items-center"
                                :href="route('logout')"
                                method="post"
                                as="button"
                            >
                                <LogOutIcon class="mr-2 h-4 w-4" />
                                <span>Logout</span>
                            </Link>
                        </DropdownMenuItem>
                    </DropdownMenuContent>
                </DropdownMenu>
                <Button v-else as-child>
                    <Link :href="route('login')"> Join </Link>
                </Button>
            </nav>
        </div>
    </header>
</template>

<style scoped></style>
