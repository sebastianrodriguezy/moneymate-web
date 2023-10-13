import { API, commonHeaders, getUserId } from "../../utils.js";

export default {
    init() {
        const hasThemeInStorage = window.localStorage.getItem("theme");

        if (!hasThemeInStorage) {
            this.on = window.matchMedia("(prefers-color-scheme: dark)").matches;
        } else {
            const isDark = hasThemeInStorage === "dark";

            this.on = isDark;
            this.logo = isDark ? "/img/logo_white.png" : "/img/logo.png";
        }
    },
    on: false,
    logo: "/img/logo_white.png",
    async toggle() {
        try {
            const response = await axios.put(
                API.config.updateTheme,
                {
                    user_id: getUserId(),
                    theme: this.on ? "dark" : "light",
                },
                { headers: commonHeaders }
            );

            if (response.status !== 200) return;

            this.on = !this.on;
            this.logo = this.on ? "/img/logo_white.png" : "/img/logo.png";

            window.localStorage.setItem("theme", this.on ? "dark" : "light");
        } catch (error) {
            this.on = this.on;
            this.logo = this.logo;
        }
    },
};
