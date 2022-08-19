import { defineStore } from "pinia";

export const useSettingStore = defineStore({
  id: "setting",
  state: () => ({
    token: null,
  }),
  getters: {
    token: (state) => state.token,
  },
  actions: {
    increment(token) {
      this.token = token;
    },
  },
});
