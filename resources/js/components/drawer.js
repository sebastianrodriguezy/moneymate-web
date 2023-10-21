export default () => ({
    showDrawer: false,
    showDrawerSecondaryAction: false,
    titleDrawer: "",
    activeDrawer: "filters",
    dataDrawer: {},
    openDrawer(drawer = "filters", data = {}, title = "") {
        this.activeDrawer = drawer;
        this.titleDrawer = title;
        this.dataDrawer = data;
        this.showDrawer = true;
    },
    closeDrawer() {
        this.showDrawer = false;
    },
});
