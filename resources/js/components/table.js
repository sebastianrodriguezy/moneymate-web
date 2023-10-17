import { commonHeaders } from "../utils";

export default (endpoint = "") => ({
    async init() {
        try {
            await callRequest();
        } catch (error) {
            this.error = error.message;
        }
    },
    page: 1,
    totalPages: 1,
    totalRows: 0,
    rowsShowing: 0,
    loading: true,
    rows: [],
    filters: {},
    error: null,
    async callRequest() {
        let filtersString = "";

        Object.keys(this.filters).forEach(
            (key) => (filtersString += `&${key}=${this.filters[key]}`)
        );

        const finalUri = `${endpoint}?page=${this.page}${filtersString}`;

        const response = await axios.get(finalUri, {
            headers: commonHeaders,
        });

        const { totalRows, count, rows } = response?.data;

        this.totalPages = Math.floor(totalRows / 10);
        this.totalRows = totalRows;
        this.rowsShowing = count;
        this.loading = false;
        this.rows = rows;

        this.error = null;
    },
    changePage: {
        async ["@click"](page) {
            this.page = page;
            try {
                await callRequest();
            } catch (error) {
                this.error = error.message;
            }
        },
    },
    updateFilters: {
        ["@click"](name, value) {
            this.filters[name] = value;
        },
    },
    applyFilters: {
        async ["@click"]() {
            try {
                await callRequest();
            } catch (error) {
                this.error = error.message;
            }
        },
    },
});
