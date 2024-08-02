// Stores/GeneratedClient.js
import { defineStore } from "pinia";

export const useDataStore = defineStore("data", {
    state: () => ({
        user: {
            name: '',
            id: null,
        },
        isLogin: false,
    }),
    actions: {
        setUser(user) {
            this.user = user;
        },
        setLogin(status) {
            this.isLogin = status;
        }
    },
    getters: {
        getUser(state) {
            return state.user;
        },
        getLoginStatus(state) {
            return state.isLogin;
        } , 
        getUserName(state) {
            return state.user.name;
        }
    } ,
    persist: {
        enabled: true
    }
});
