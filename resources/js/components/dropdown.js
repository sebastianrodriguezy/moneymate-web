import { catalogs, commonHeaders, PREFIX } from "../utils";

export default (catalog, onClick = null) => ({
    async init() {
        const selectedCatalog = catalogs[catalog];

        if (!selectedCatalog.async) {
            this.isLoadingDropdown = false;
            this.translateOptionsDropdown = true;
            this.optionsDropdown = selectedCatalog.options;
        } else {
            this.isLoadingDropdown = true;
            try {
                const url = `${PREFIX}${selectedCatalog.endpoint}`;
                const response = await axios.get(url, {
                    headers: commonHeaders,
                });

                const { rows } = response.data.data;
                const formatedRows = rows.map((row) => ({
                    id: row.id,
                    label: row.name,
                }));

                this.optionsDropdown = formatedRows;
                this.translateOptionsDropdown = false;
            } catch (error) {
                this.optionsDropdown = [];
                this.translateOptionsDropdown = false;
            } finally {
                this.isLoadingDropdown = false;
            }
        }
    },
    openDropdown: false,
    isLoadingDropdown: true,
    optionsDropdown: [],
    translateOptionsDropdown: false,
    valueDropdown: null,
    toggleDropdown() {
        if (this.openDropdown) {
            return this.closeDropdown();
        }

        this.$refs.button.focus();
        this.openDropdown = true;
    },
    closeDropdown(focusAfter) {
        if (!this.openDropdown) return;

        this.openDropdown = false;
        focusAfter && focusAfter.focus();
    },
    onClickOptionDropdown(value) {
        this.valueDropdown = value;
        this.closeDropdown();

        if (onClick) onClick(this.valueDropdown);
    },
    clearValue() {
        this.valueDropdown();
    },
});
