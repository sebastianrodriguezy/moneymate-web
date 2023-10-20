import "./bootstrap";

import Alpine from "alpinejs";
import darkModeStore from "./components/stores/darkmode";
import lang from "./components/lang";
import drawer from "./components/drawer";
import table from "./components/table";

window.Alpine = Alpine;

Alpine.store("darkMode", darkModeStore);

Alpine.data("lang", lang);
Alpine.data("table", table);
Alpine.data("drawer", drawer);

Alpine.start();
