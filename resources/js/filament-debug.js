document.addEventListener("DOMContentLoaded", () => {
    console.log("%c[Filament Debug] Script loaded", "color: green; font-weight: bold;");

    // Tangkap error JS global
    window.addEventListener("error", (event) => {
        console.error("[Filament Error]", event.message, "at", event.filename, ":", event.lineno);
    });

    // Tangkap unhandled promise rejection
    window.addEventListener("unhandledrejection", (event) => {
        console.error("[Filament Promise Rejection]", event.reason);
    });

    // Debug Livewire hooks
    if (window.Livewire) {
        console.log("[Filament Debug] Livewire detected");

        Livewire.hook("component.initialized", (component) => {
            console.log("[Livewire Init]", component);
        });

        Livewire.hook("element.removed", (el, component) => {
            console.log("[Livewire Removed Element]", el, "from", component);
        });
    } else {
        console.warn("[Filament Debug] Livewire not found at DOMContentLoaded");
    }
});
