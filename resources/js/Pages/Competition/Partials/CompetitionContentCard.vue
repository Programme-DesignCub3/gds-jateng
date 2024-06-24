<script setup lang="ts">
const props = withDefaults(defineProps<{ position: "left" | "right" }>(), {
    position: "left",
});
</script>

<template>
    <div class="grid min-h-10 grid-cols-2">
        <div
            class="container flex flex-col items-end justify-center text-center"
        >
            <div class="ml-auto flex max-w-[75%] flex-col gap-y-8">
                <h2 class="font-bold md:text-lg">Hadiah</h2>
                <p class="text-lg font-bold text-[#1F4387] md:text-2xl">
                    LOREM IPSUM
                </p>
                <div class="font-raleway max-md:text-sm max-sm:text-xs">
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Repellat quia dolore accusantium dicta expedita, quo,
                        eaque quis unde mollitia ex eos et in, maxime ab
                        incidunt ducimus aliquam consequuntur aperiam?
                    </p>
                </div>
            </div>
        </div>

        <div
            class="competition-detail-pattern flex items-center justify-normal"
        >
            <div
                class="relative mx-4 flex aspect-square w-1/2 shrink overflow-hidden rounded-full md:mx-10 md:my-20"
            >
                <img
                    src="https://unsplash.it/500/900"
                    alt=""
                    class="w-full object-cover object-center"
                />

                <span
                    class="bg-competition-juri-overlay absolute left-0 top-0 size-full w-full bg-contain bg-center bg-no-repeat"
                />
            </div>
        </div>
    </div>
</template>

<style scoped></style>
