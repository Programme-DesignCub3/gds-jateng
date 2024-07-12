import "../css/app.css";
import "./bootstrap";

import { createInertiaApp, router } from "@inertiajs/vue3";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import { createApp, h, type DefineComponent } from "vue";

import { ZiggyVue } from "../../vendor/tightenco/ziggy";
const appName = import.meta.env.VITE_APP_NAME || "Laravel";

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    // ? default layout config, somehow not working
    // resolve: (name) => {
    //     const pages = import.meta.glob<DefineComponent>("./Pages/**/*.vue", {
    //         eager: true,
    //     });

    //     let page = pages[`./Pages/${name}.vue`];
    //     page.default.layout = [
    //         "Auth/Login",
    //         "Auth/ForgotPassword",
    //         "Auth/ConfirmPassword",
    //     ].includes(name)
    //         ? undefined
    //         : AppLayout;
    //     return page;
    // },
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob<DefineComponent>("./Pages/**/*.vue"),
        ),
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props), methods: {} })
            .use(plugin)
            .use(ZiggyVue)
            .mount(el);
    },
    progress: {
        color: "#4B5563",
    },
});

/**
 * Track Page and Send to Google Analytic
 * */

router.on("navigate", (event) => {
    // @ts-expect-error
    gtag("js", new Date());
    // @ts-expect-error
    gtag("config", "G-XXX");
    // @ts-expect-error
    gtag("event", "page_view", {
        page_location: event.detail.page.url,
        page_title: document.title,
    });
});
