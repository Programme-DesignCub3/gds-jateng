@php
    $videoPath = asset('storage/' . $getState());
@endphp

<div class="w-full">
    <video 
        src="{{ $videoPath }}" 
        controls
        class="w-full rounded-lg aspect-video pointer-events-auto"
    >
        Your browser does not support the video tag.
    </video>
</div>
