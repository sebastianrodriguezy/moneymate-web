import "./bootstrap";

import Alpine from "alpinejs";
import darkModeStore from "./components/stores/darkmode";

window.Alpine = Alpine;

Alpine.store("darkMode", darkModeStore);

Alpine.start();
