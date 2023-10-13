import "./bootstrap";

import Alpine from "alpinejs";
import darkModeStore from "./components/stores/darkmode";
import lang from "./components/lang";

window.Alpine = Alpine;

Alpine.store("darkMode", darkModeStore);
Alpine.data("lang", lang);

Alpine.start();
