const token = document.querySelector("#user_token");
const userId = document.querySelector("#user_id");

const PREFIX = "/api";

export const API = {
    config: {
        updateTheme: `${PREFIX}/update_theme`,
        getConfig: `${PREFIX}/get_config`,
        updateConfig: `${PREFIX}/update_config`,
    },
};

export const commonHeaders = {
    "Content-type": "application/json",
    Authorization: `Bearer ${token.value}`,
};

export const getUserId = () => userId.value;
