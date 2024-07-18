import { defineStore } from "pinia";

export const data = defineStore("data", {
    state: () => ({
        data: {
            name: "",
        },
    }),
    actions: {
        setData(data) {
            this.data = data;
        },
    },
    getters: {
        getData() {
            return this.data;
        },
    },
})