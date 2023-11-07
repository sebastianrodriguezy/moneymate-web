import "./bootstrap";

import Alpine from "alpinejs";
import darkModeStore from "./components/stores/darkmode";
import lang from "./components/lang";
import drawer from "./components/drawer";
import table from "./components/table";
import helpers from "./components/helpers";
import dropdown from "./components/dropdown";
import modal from "./components/modal";

window.Alpine = Alpine;

Alpine.store("darkMode", darkModeStore);

Alpine.data("lang", lang);
Alpine.data("table", table);
Alpine.data("drawer", drawer);
Alpine.data("helpers", helpers);
Alpine.data("dropdown", dropdown);
Alpine.data("modal", modal);

Alpine.start();
