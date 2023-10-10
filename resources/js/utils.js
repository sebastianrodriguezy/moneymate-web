const $ = (selector) => document.querySelector(selector);

const themeButton = $("#theme");

themeButton.addEventListener("click", () => {
    const actualTheme = document.body.dataset.mode;

    if (actualTheme === "dark") document.body.dataset.mode = "light";
    else document.body.dataset.mode = "dark";
});
