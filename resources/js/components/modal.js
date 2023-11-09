import {
    PREFIX,
    MODAL_ACTIONS,
    commonHeaders,
    getQueryParams,
    modalCatalogs,
} from "../utils";

export default () => ({
    init() {
        const params = getQueryParams();
        if (params.get("action")) {
            const action = params.get("action");

            if (action === MODAL_ACTIONS.NEW_MOVEMENT) {
                this.openModal(MODAL_ACTIONS.NEW_MOVEMENT, "2xl");
            }

            if (action === MODAL_ACTIONS.NEW_CATEGORY) {
                this.openModal(MODAL_ACTIONS.NEW_CATEGORY);
            }
        }
    },
    showModal: false,
    modalSize: "md",
    titleModal: "",
    subtitleModal: "",
    isSendingData: false,
    modalData: {},
    errors: [],
    endpoint: "",
    openModal(catalog = "", size = "md") {
        const modalCatalog = modalCatalogs[catalog];

        this.titleModal = modalCatalog.title;
        this.subtitleModal = modalCatalog.subtitle;
        this.modalData = modalCatalog.dataSchema;
        this.endpoint = modalCatalog.endpoint;
        this.modalSize = size;
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
