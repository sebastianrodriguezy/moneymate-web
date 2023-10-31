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
