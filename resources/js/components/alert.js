export default () => ({
    showAlert: false,
    alertTitle: "",
    alertType: "",
    timeout: null,
    dispatchAlert(type, title) {
        this.showAlert = true;
        this.alertType = type;
        this.alertTitle = title;

        this.timeout = setTimeout(() => {
            this.showAlert = false;
            this.alertType = "";
            this.alertTitle = "";

            clearTimeout(this.timeout);
        }, 5000);
    },
});
