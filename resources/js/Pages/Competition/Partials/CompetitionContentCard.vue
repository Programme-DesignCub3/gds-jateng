<script setup lang="ts">
const props = withDefaults(defineProps<{ position: "left" | "right" }>(), {
    position: "left",
});
</script>

<template>
    <div class="grid min-h-10 grid-cols-2">
        <div
            class="container flex flex-col items-end justify-center text-center max-md:px-4 max-md:py-8"
            :class="{ 'order-1': props.position === 'right' }"
        >
            <div
                class="flex h-full flex-col justify-around gap-y-4 md:max-h-[50%] md:max-w-[80%] lg:max-w-[50%]"
                :class="{
                    'md:ml-auto': props.position === 'left',
                    'md:mr-auto': props.position === 'right',
                }"
            >
                <h2 class="font-bold md:text-xl lg:text-2xl">Hadiah</h2>
                <p
                    class="text-xl font-bold text-[#1F4387] md:text-2xl lg:text-4xl"
                >
                    Dewan Juri
                </p>
                <div
                    class="font-raleway text-xs font-bold md:text-sm lg:text-base"
                >
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Repellat quia dolare accusantium dicta expedita, quo,
                        eaque quis unde mollitia ex eos et in, maxime ab
                        incidunt ducimus aliquam consequuntur aperiam?
                    </p>
                </div>
            </div>
        </div>

        <div
            class="competition-detail-pattern flex items-center justify-start bg-[length:25%] max-md:p-4 lg:bg-[length:5%] xl:bg-[length:20%]"
            :class="{ 'justify-end': props.position === 'right' }"
        >
            <div
                class="relative mx-4 flex aspect-square shrink overflow-hidden rounded-full md:mx-10 md:my-20 md:w-1/2"
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
