import { PREFIX, commonHeaders } from "../utils";

const endpointsCatalog = {
    totals: {
        url: "/movements/get_totals",
        query: "",
    },
    movements: {
        url: "/movements",
        query: "?limit=5",
    },
    categories: {
        url: "/categories",
        query: "?limit=5",
    },
    persons: {
        url: "/persons",
        query: "?limit=5",
    },
};

export default (catalogName = "") => ({
    async init() {
        try {
            this.catalog = endpointsCatalog[catalogName];
            await this.getData();
        } catch (error) {}
    },
    dataCalc: null,
    isLoadingCalc: true,
    errorInCalc: null,
    catalog: {},
    async getData() {
        try {
            this.isLoadingCalc = true;
            const uri = `${PREFIX}${this.catalog.url}${this.catalog.query}`;
            const response = await axios(uri, {
                method: "GET",
                headers: commonHeaders,
            });

            const data = response.data.data;
            console.log({ data });

            this.dataCalc = data;
            this.isLoadingCalc = false;
            this.errorInCalc = [];
        } catch (error) {
            const errors = error?.response?.data?.errors;
            const errorsFormated = [];

            Object.keys(errors || {}).forEach((key) => {
                errorsFormated.push(errors[key][0]);
            });

            this.isLoadingCalc = false;
            this.errorInCalc = errorsFormated;
            this.dataCalc = null;
        }
    },
});
