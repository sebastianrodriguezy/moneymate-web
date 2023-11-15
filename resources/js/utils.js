import { parse, format } from "date-fns";
import { v4 as uuidv4 } from "uuid";

import { TRANSLATIONS } from "./translations";

const token = document.querySelector("#user_token");
const userId = document.querySelector("#user_id");

export const PREFIX = "/api";

export const API = {
    config: {
        updateTheme: `${PREFIX}/update_theme`,
        getConfig: `${PREFIX}/get_config`,
        updateConfig: `${PREFIX}/update_config`,
    },
    movements: {
        getMovements: `${PREFIX}/movements`,
    },
};

export const commonHeaders = {
    "Content-type": "application/json",
    Authorization: `Bearer ${token?.value}`,
};

export const getUserId = () => userId?.value;

export const catalogs = {
    categories: {
        async: true,
        endpoint: "/categories",
        method: "GET",
        data: null,
    },
    persons: {
        async: true,
        endpoint: "/persons",
        method: "GET",
        data: null,
    },
    types: {
        async: true,
        endpoint: "/translate",
        method: "POST",
        data: {
            t_keys: ["income", "discharge"],
        },
    },
};

export const getQueryParams = () => {
    const urlParams = new URLSearchParams(window.location.search);

    return urlParams;
};

export const MODAL_ACTIONS = {
    NEW_MOVEMENT: "new_movement",
    NEW_CATEGORY: "new_category",
    NEW_PERSON: "new_person",
};

export const translateText = (key) => {
    const path = window.location.pathname;
    const [, language] = path.split("/");

    return TRANSLATIONS[language][key];
};

export const modalCatalogs = {
    [MODAL_ACTIONS.NEW_MOVEMENT]: {
        title: translateText("new_movement_title"),
        subtitle: translateText("new_movement_subtitle"),
        dataSchema: {
            type: "",
            category_id: "",
            person_id: null,
            amount: "",
            movement_date: "",
            comments: "",
        },
        endpoint: "/movement",
        tranformBodyData: (data) => {
            return {
                movement_id: uuidv4(),
                type: data.type,
                fk_user_id: getUserId(),
                fk_category_id: data.category_id,
                fk_person_id: data?.person_id || null,
                amount: Number(
                    String(data.amount).replace(",", "").replace(".", "")
                ),
                movement_date: data.movement_date
                    ? format(
                          parse(data.movement_date, "dd/MM/yyyy", new Date()),
                          "yyyy-MM-dd"
                      )
                    : null,
                comments: data?.comments || "",
            };
        },
    },
    [MODAL_ACTIONS.NEW_CATEGORY]: {
        title: translateText("new_category_title"),
        subtitle: translateText("new_category_subtitle"),
        dataSchema: {
            name: "",
            color: {
                name: "default",
                light: "gray.200",
                dark: "gray.700",
            },
        },
        endpoint: "/category",
        tranformBodyData: (data) => {
            return {
                category_id: uuidv4(),
                fk_user_id: getUserId(),
                name: data.name,
                color: JSON.stringify(data.color),
            };
        },
    },
    [MODAL_ACTIONS.NEW_PERSON]: {
        title: translateText("new_person_title"),
        subtitle: translateText("new_person_subtitle"),
        dataSchema: {
            name: "",
        },
        endpoint: "/new_person",
    },
};
