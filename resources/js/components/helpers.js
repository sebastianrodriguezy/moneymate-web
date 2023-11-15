import { format, parseISO } from "date-fns";

export default () => ({
    formatStringToMoney(
        value,
        type,
        decimalSeparator = ".",
        significantDigits = 0
    ) {
        let newValue = value;

        if (typeof value !== "number") newValue = 0;

        const fixedValue = newValue.toFixed(significantDigits);
        const [currency, decimal] = fixedValue.split(".");

        const thousandPartValue = currency.replace(/(\d)(?=(\d{3})+$)/g, "$1,");
        const decimalPartValue = `${decimalSeparator}${decimal}`;
        const formatedValue = `${
            type === "discharge" ? "- " : ""
        }$${thousandPartValue}${significantDigits ? decimalPartValue : ""}`;

        return formatedValue;
    },
    formatMoneyToNumber(value) {
        const valueWithoutCommas = value.replace(/[,]/g, "");
        const valueFormated = valueWithoutCommas.replace("$", "").trim();

        return Number(valueFormated);
    },
    formatToReadableNumber(amount) {
        const suffixes = ["", "K", "M", "B", "T"];
        const scales = Math.floor(Math.log10(amount) / 3);

        if (scales < 1) {
            return amount.toString();
        } else {
            const suffix = suffixes[scales];
            const scaledAmount = amount / Math.pow(1000, scales);
            return scaledAmount.toFixed(1) + suffix;
        }
    },
    transformColorToClass(colorString) {
        const { name } = JSON.parse(colorString);

        const colors = {
            ["default"]: "bg-gray-700 dark:bg-gray-600",
            ["primary"]: "bg-brand-500 dark:bg-brand-600",
            ["secondary"]: "bg-orange-500 dark:bg-orange-600",
            ["tertiary"]: "bg-cyan-500 dark:bg-cyan-600",
            ["rose"]: "bg-rose-500 dark:bg-rose-600",
            ["purple"]: "bg-purple-500 dark:bg-purple-600",
            ["indigo"]: "bg-indigo-500 dark:bg-indigo-600",
            ["amber"]: "bg-amber-500 dark:bg-amber-600",
            ["blueGray"]: "bg-violet-500 dark:bg-violet-600",
            ["red"]: "bg-red-500 dark:bg-red-600",
            ["yellow"]: "bg-yellow-500 dark:bg-yellow-600",
            ["lime"]: "bg-lime-500 dark:bg-lime-600",
        };

        return colors[name];
    },
    formatDate(date, withHours = false) {
        const formatType = withHours ? "dd/MM/yyyy '-' hh:mm" : "dd/MM/yyyy";
        return format(parseISO(date), formatType);
    },
    getColorsToSelect() {
        return [
            {
                name: "default",
                class: "bg-gray-700 dark:bg-gray-600",
                jsonObject: {
                    name: "default",
                    light: "gray.200",
                    dark: "gray.700",
                },
            },
            {
                name: "primary",
                class: "bg-brand-500 dark:bg-brand-600",
                jsonObject: {
                    name: "primary",
                    light: "primary.500",
                    dark: "primary.500",
                },
            },
            {
                name: "secondary",
                class: "bg-orange-500 dark:bg-orange-600",
                jsonObject: {
                    name: "secondary",
                    light: "secondary.500",
                    dark: "secondary.500",
                },
            },
            {
                name: "tertiary",
                class: "bg-cyan-500 dark:bg-cyan-600",
                jsonObject: {
                    name: "tertiary",
                    light: "tertiary.500",
                    dark: "tertiary.500",
                },
            },
            {
                name: "rose",
                class: "bg-rose-500 dark:bg-rose-600",
                jsonObject: {
                    name: "rose",
                    light: "rose.500",
                    dark: "rose.500",
                },
            },
            {
                name: "purple",
                class: "bg-purple-500 dark:bg-purple-600",
                jsonObject: {
                    name: "purple",
                    light: "purple.500",
                    dark: "purple.500",
                },
            },
            {
                name: "indigo",
                class: "bg-indigo-500 dark:bg-indigo-600",
                jsonObject: {
                    name: "indigo",
                    light: "indigo.500",
                    dark: "indigo.500",
                },
            },
            {
                name: "amber",
                class: "bg-amber-500 dark:bg-amber-600",
                jsonObject: {
                    name: "amber",
                    light: "amber.500",
                    dark: "amber.500",
                },
            },
            {
                name: "blueGray",
                class: "bg-violet-500 dark:bg-violet-600",
                jsonObject: {
                    name: "blueGray",
                    light: "blueGray.500",
                    dark: "blueGray.500",
                },
            },
            {
                name: "red",
                class: "bg-red-500 dark:bg-red-600",
                jsonObject: { name: "red", light: "red.500", dark: "red.500" },
            },
            {
                name: "yellow",
                class: "bg-yellow-500 dark:bg-yellow-600",
                jsonObject: {
                    name: "yellow",
                    light: "yellow.500",
                    dark: "yellow.500",
                },
            },
            {
                name: "lime",
                class: "bg-lime-500 dark:bg-lime-600",
                jsonObject: {
                    name: "lime",
                    light: "lime.500",
                    dark: "lime.500",
                },
            },
        ];
    },
});
