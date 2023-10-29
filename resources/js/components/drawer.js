export default () => ({
    showDrawer: false,
    titleDrawer: "",
    activeDrawer: "filters",
    dataDrawer: null,
    openDrawer(drawer = "filters", data = null, title = "") {
        this.dataDrawer = data;
        this.activeDrawer = drawer;
        this.titleDrawer = title;
        this.showDrawer = true;
    },
    closeDrawer() {
        this.showDrawer = false;
    },
});
