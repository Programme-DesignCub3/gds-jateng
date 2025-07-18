import forms from "@tailwindcss/forms";
import defaultTheme from "tailwindcss/defaultTheme";

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: "class",
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.{ts,tsx,vue}",
    ],

    theme: {
        container: {
            center: true,
            padding: "2rem",
            screens: {
                "2xl": "1400px",
            },
        },
        extend: {
            backgroundImage: {
                login: "url('/assets/images/login.svg')",
                boy: "url('/assets/images/illust_boy.svg')",
                girl: "url('/assets/images/illust_girl.svg')",
                "announcement-illust-etc":  
                    "url('/assets/images/announcement_illust_etc.svg')",
                "competition-boy":
                    "url('/assets/images/competition_illust_boy.svg')",
                "competition-girl":
                    "url('/assets/images/competition_illust_girl.svg')",
                "competition-blob-1":
                    "url('/assets/images/competition_blob_tl.svg')",
                "competition-blob-2":
                    "url('/assets/images/competition_blob_br.svg')",
                "competition-paper-rip": "url('/assets/images/paper_rip.svg')",
                "orange-paper-rip":
                    "url('/assets/images/paper_rip_orange.svg')",
                "competition-juri-overlay":
                    "url('/assets/images/circle_overlay.png')",
                "galery-pattern"
                    : "url('/assets/images/bg_galery.png')",
            },
            screens: {
                xs: "375px",
            },
            zIndex: { 1: "1" },
            colors: {
                border: "hsl(var(--border))",
                input: "hsl(var(--input))",
                ring: "hsl(var(--ring))",
                background: "hsl(var(--background))",
                foreground: "hsl(var(--foreground))",
                primary: {
                    DEFAULT: "hsl(var(--primary))",
                    foreground: "hsl(var(--primary-foreground))",
                },
                secondary: {
                    DEFAULT: "hsl(var(--secondary))",
                    foreground: "hsl(var(--secondary-foreground))",
                },
                destructive: {
                    DEFAULT: "hsl(var(--destructive))",
                    foreground: "hsl(var(--destructive-foreground))",
                },
                muted: {
                    DEFAULT: "hsl(var(--muted))",
                    foreground: "hsl(var(--muted-foreground))",
                },
                accent: {
                    DEFAULT: "hsl(var(--accent))",
                    foreground: "hsl(var(--accent-foreground))",
                },
                popover: {
                    DEFAULT: "hsl(var(--popover))",
                    foreground: "hsl(var(--popover-foreground))",
                },
                card: {
                    DEFAULT: "hsl(var(--card))",
                    foreground: "hsl(var(--card-foreground))",
                },
            },
            borderRadius: {
                lg: "var(--radius)",
                md: "calc(var(--radius) - 2px)",
                sm: "calc(var(--radius) - 4px)",
            },
            fontFamily: {
                helvetica: ["Helvetica", ...defaultTheme.fontFamily.sans],
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
                syne: ["Syne", ...defaultTheme.fontFamily.sans],
                raleway: ["Raleway", ...defaultTheme.fontFamily.sans],
            },
            keyframes: {
                "accordion-down": {
                    from: { height: 0 },
                    to: { height: "var(--radix-accordion-content-height)" },
                },
                "accordion-up": {
                    from: { height: "var(--radix-accordion-content-height)" },
                    to: { height: 0 },
                },
                "collapsible-down": {
                    from: { height: 0 },
                    to: { height: "var(--radix-collapsible-content-height)" },
                },
                "collapsible-up": {
                    from: { height: "var(--radix-collapsible-content-height)" },
                    to: { height: 0 },
                },
            },
            animation: {
                "accordion-down": "accordion-down 0.2s ease-out",
                "accordion-up": "accordion-up 0.2s ease-out",
                "collapsible-down": "collapsible-down 0.2s ease-in-out",
                "collapsible-up": "collapsible-up 0.2s ease-in-out",
            },
        },
    },

    plugins: [forms, require("tailwindcss-animate")],
};
