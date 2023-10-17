export default () => ({
    show: false,
    trigger: {
        ["@click"]() {
            this.show = true;
        },
    },
    close: {
        ["@click"]() {
            this.show = false;
        },
    },
});
