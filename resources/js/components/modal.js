import {
    PREFIX,
    MODAL_ACTIONS,
    commonHeaders,
    getQueryParams,
    modalCatalogs,
    translateText,
} from "../utils";

let dataSchema = {};

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
    modalErrors: {},
    endpoint: "",
    tranformBodyData: null,
    openModal(catalog = "", size = "md") {
        const modalCatalog = modalCatalogs[catalog];

        this.titleModal = modalCatalog.title;
        this.subtitleModal = modalCatalog.subtitle;
        this.modalData = modalCatalog.dataSchema;
        this.endpoint = modalCatalog.endpoint;
        this.modalSize = size;
        this.tranformBodyData = modalCatalog?.tranformBodyData;
        this.showModal = true;

        dataSchema = modalCatalog.dataSchema;
    },
    closeModal() {
        if (this.isSendingData) return;

        this.showModal = false;
        this.isSendingData = false;
    },
    updateModalData(key, value) {
        this.modalData[key] = value;
    },
    async sendData() {
        try {
            this.isSendingData = true;
            this.modalErrors = {};

            const parsedData = this.tranformBodyData
                ? this.tranformBodyData(this.modalData)
                : this.modalData;

            const url = `${PREFIX}${this.endpoint}`;
            await axios(url, {
                method: "POST",
                headers: commonHeaders,
                data: parsedData,
            });

            this.isSendingData = false;
            this.errors = [];

            this.closeModal();

            this.modalData = { ...dataSchema };

            this.$dispatch("refresh-table");
            this.$dispatch("notify", {
                type: "success",
                message: translateText("success_register"),
            });
        } catch (error) {
            this.isSendingData = false;
            const errors = error?.response?.data?.errors;
            const errorsFormated = {};
            Object.keys(errors || {}).forEach((key) => {
                errorsFormated[key] = errors[key][0];
            });
            this.modalErrors = errorsFormated;

            this.$dispatch("notify", {
                type: "error",
                message: translateText("error_register"),
            });
        }
    },
});
