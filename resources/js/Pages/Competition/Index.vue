<template>
    <Head title="Kompetisi" />
    <AppLayout>
        <MainHeader
            bgImage="/assets/images/home.svg"
            class="bg-primary bg-[length:150%] bg-center bg-no-repeat md:bg-[length:125%] lg:bg-[length:115%] xl:bg-[length:110%]"
        />
        <div
            class="container mb-8 flex flex-col items-center justify-center gap-y-8"
        >
            <Collapsible v-model:open="isOpen" class="w-full md:max-w-3xl">
                <CollapsibleTrigger class="w-full">
                    <div
                        class="flex h-full w-full items-center justify-between gap-x-4 gap-y-4 rounded-2xl border-2 border-primary p-4 max-md:size-auto max-md:h-full max-md:flex-col md:max-h-80 md:max-w-3xl md:pr-16"
                    >
                        <h2 class="mb-3 text-xl font-bold md:mb-1 md:text-2xl">
                            Good Creation
                        </h2>

                        <Button
                            class="flex w-fit shrink-0 gap-2 rounded-lg px-2 pr-3 max-md:w-full md:rounded-full"
                            size="icon"
                        >
                            <ArrowRight
                                class="transition-transform"
                                :class="{
                                    'rotate-90': isOpen,
                                }"
                            />
                            Expand
                        </Button>
                    </div>
                </CollapsibleTrigger>
                <CollapsibleContent
                    class="flex flex-col gap-y-4"
                    :class="{ 'mt-4': isOpen }"
                >
                    <CompetitionCard
                        v-for="competition in goodCreationCompetition"
                        class="ml-auto w-[95%]"
                        :title="competition.title"
                        :imageUrl="`/assets/images/competition/overall/${competition.route}.jpg`"
                        :shortDesc="competition.shortDesc"
                        :route="competition.route"
                        :key="competition.title"
                    />
                    <Separator class="bg-red-600" decorative />
                </CollapsibleContent>
            </Collapsible>

            <CompetitionCard
                v-for="competition in kolaborasaCompetition"
                class="w-full"
                :title="competition.title"
                :imageUrl="`/assets/images/competition/overall/${competition.route}.jpg`"
                :shortDesc="competition.shortDesc"
                :route="competition.route"
                :key="competition.title"
            />
        </div>
    </AppLayout>
</template>

<script setup lang="ts">
import MainHeader from "@/Components/MainHeader.vue";
import CompetitionCard from "@/Components/CompetitionCard.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import { Head } from "@inertiajs/vue3";
import { ref } from "vue";
import {
    Collapsible,
    CollapsibleContent,
    CollapsibleTrigger,
} from "@/Components/ui/collapsible";
import { ArrowRight } from "lucide-vue-next";
import { Button } from "@/Components/ui/button";
import { Separator } from "@/Components/ui/separator";

const props = defineProps<{
    competitionList: {
        title: string;
        shortDesc: string;
        route: string;
    }[];
}>();

const isOpen = ref(false);

const goodCreationCompetition = props.competitionList.filter(
    (competition) => competition.route !== "kolaborasa",
);

const kolaborasaCompetition = props.competitionList.filter(
    (competition) => competition.route === "kolaborasa",
);
</script>

<style scoped></style>
