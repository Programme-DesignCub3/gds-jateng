export interface User {
    competition: string;
    is_school_account: boolean;
    id: number;
    name: string;
    school_name: string;
    position: string;
    area: string;
    instagram_account: string;
    phone_no: string;
    address: string;
    email: string;
    email_verified_at: string;
}

export type PageProps<
    T extends Record<string, unknown> = Record<string, unknown>,
> = T & {
    auth: {
        user: User;
    };
};
