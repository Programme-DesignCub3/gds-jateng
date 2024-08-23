export type TFinalist = {
    school_name: string;
    name: string;
    thumbnail: string;
};

export type TFinalistList = {
    competition: string;
    label: string;
    list: TFinalist[];
};
