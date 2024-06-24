import "../css/app.css";
import "./bootstrap";
import AppLayout from "./Layouts/AppLayout.vue";

import { createInertiaApp } from "@inertiajs/vue3";
import { createApp, h, type DefineComponent } from "vue";
import { ZiggyVue } from "../../vendor/tightenco/ziggy";
const appName = import.meta.env.VITE_APP_NAME || "Laravel";

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => {
        const pages = import.meta.glob<DefineComponent>("./Pages/**/*.vue", {
            eager: true,
        });

        let page = pages[`./Pages/${name}.vue`];
        page.default.layout = [
            "Auth/Login",
            "Auth/ForgotPassword",
            "Auth/ConfirmPassword",
        ].includes(name)
            ? undefined
            : AppLayout;
        return page;
    },
    // resolve: (name) =>
    //     resolvePageComponent(
    //         `./Pages/${name}.vue`,
    //         import.meta.glob<DefineComponent>("./Pages/**/*.vue"),
    //     ),
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .mount(el);
    },
    progress: {
        color: "#4B5563",
    },
});
