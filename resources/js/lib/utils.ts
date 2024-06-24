import { clsx, type ClassValue } from "clsx";
import { twMerge } from "tailwind-merge";

export function cn(...inputs: ClassValue[]) {
    return twMerge(clsx(inputs));
}

export function getInitials(name: string) {
    var parts = name.split(" ", 2);
    var initials = "";
    for (var i = 0; i < parts.length; i++) {
        if (parts[i].length > 0 && parts[i] !== "") {
            initials += parts[i][0];
        }
    }
    return initials;
}

export function useNumberKeydown() {
    const isNumberKey = (event: KeyboardEvent): void => {
        const key = event.key;
        // Check if the key is a number or one of the special keys like Backspace, Arrow keys, etc.
        const isNumber = /[0-9]/.test(key);
        const isSpecialKey = [
            "Backspace",
            "ArrowLeft",
            "ArrowRight",
            "Tab",
            "Enter",
        ].includes(key);

        if (!isNumber && !isSpecialKey) {
            event.preventDefault();
        }
    };

    return {
        isNumberKey,
    };
}
