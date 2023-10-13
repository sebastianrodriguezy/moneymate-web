export default (actualLang = "") => ({
    init() {
        this.lang = actualLang === "es" ? "EN" : "ES";
    },
    lang: actualLang,
    trigger: {
        ["@click"]() {
            const actualPath = location.pathname;
            const splitedPath = actualPath.split("/").filter((slug) => slug);
            const [langInPath, ...slug] = splitedPath;

            const newLang = langInPath === "es" ? "en" : "es";
            const newUrl = "/" + [newLang, ...slug].join("/");

            location.replace(newUrl);
        },
    },
});
