<script setup lang="ts">
import { Link } from "@inertiajs/vue3";
</script>

<template>
  <div class="container relative z-0 md:w-2/4 w-full pb-28 text-center pt-16">
    <div class="flex flex-col gap-6 lg:text-xl md:text-lg text-base font-montserrat">
      <p>
        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euis mod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea com modo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse mo lestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feu gait nulla facilisi. <br>
        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euis mod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea com modo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse mo lestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feu gait nulla facilisi.
      </p>
    </div>
    
    <div class="flex justify-center gap-x-4">
      <div class="mt-20">
        <Link 
          :href="route('competition.index')" 
          class="bg-primary px-6 py-2 rounded-full text-white transform hover:bg-primary/60 ease-in-out inline-block"
        >
          More Info
        </Link>
      </div>
    </div>
  </div>
</template>