import { PREFIX, commonHeaders } from "../utils";

export default () => ({
    showModal: false,
    titleModal: "",
    subtitleModal: "",
    isSendingData: false,
    modalData: {},
    errors: [],
    endpoint: "",
    openModal(title = "", subtitleModal = "", endpoint = "", dataSchema = {}) {
        this.titleModal = title;
        this.subtitleModal = subtitleModal;
        this.modalData = dataSchema;
        this.endpoint = endpoint;
        this.showModal = true;
    },
    closeModal() {
        if (this.isSendingData) return;

        this.showModal = false;
        this.isSendingData = false;
    },
    updateModalData(key, name) {
        this.modalData[key] = name;
    },
    async sendData() {
        try {
            this.isSendingData = true;

            const url = `${PREFIX}${this.endpoint}`;
            const response = await axios(url, {
                method: "POST",
                headers: commonHeaders,
                data: this.modalData,
            });

            const { errors } = response.data.data;

            if (errors) {
                this.isSendingData = false;
                this.errors = errors;

                return;
            }

            this.isSendingData = false;
            this.errors = [];

            this.closeModal();
        } catch (error) {
            console.log(error);
        }
    },
});
