import { PREFIX, commonHeaders } from "../utils";

export default (endpoint = "") => ({
    async init() {
        try {
            await this.callRequest();
        } catch (error) {
            this.error = error.message;
        }
    },
    page: 1,
    totalPages: 1,
    totalRows: 0,
    count: 0,
    rowsShowing: 0,
    totalRowsShowing: 0,
    loading: true,
    rows: [],
    filters: {},
    error: null,
    async callRequest() {
        this.loading = true;
        let filtersString = "";

        Object.keys(this.filters).forEach(
            (key) => (filtersString += `&${key}=${this.filters[key]}`)
        );

        const finalUri = `${PREFIX}${endpoint}?page=${this.page}${filtersString}`;

        const response = await axios.get(finalUri, {
            headers: commonHeaders,
        });

        console.log({ response });

        const {
            data: { totalRows, count, rows, offset },
        } = response.data;

        this.totalPages =
            Math.floor(count / 10) === 0 ? 1 : Math.floor(count / 10);
        this.totalRows = totalRows;
        this.rowsShowing = offset === 0 ? 1 : offset;
        this.totalRowsShowing = count;
        this.loading = false;
        this.rows = rows;
        this.count = count;

        this.error = null;
    },
    paginate({ current, max }) {
        if (!current || !max) return null;

        let prev = current === 1 ? null : current - 1,
            next = current === max ? null : current + 1,
            items = [1];

        if (current === 1 && max === 1) return { current, prev, next, items };
        if (current > 4) items.push(0);

        let r = 2,
            r1 = current - r,
            r2 = current + r;

        for (let i = r1 > 2 ? r1 : 2; i <= Math.min(max, r2); i++)
            items.push(i);

        if (r2 + 1 < max) items.push(0);
        if (r2 < max) items.push(max);

        return { current, prev, next, items };
    },
    async changePage(page) {
        if (this.loading) return;
        if (!page) return;
        if (page === 0 || page === this.totalPages + 1) return;
        if (page === this.page) return;

        this.page = page;

        try {
            await this.callRequest();
        } catch (error) {
            this.error = error.message;
        }
    },
    updateFilters: {
        ["@click"](name, value) {
            this.filters[name] = value;
        },
    },
    applyFilters: {
        async ["@click"]() {
            try {
                await this.callRequest();
            } catch (error) {
                this.error = error.message;
            }
        },
    },
});
