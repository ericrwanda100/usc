import Vue from "vue";
import Vuex from "vuex";
import { BASE_URL, UPLOAD_BASE_URL } from "./variables";
import Upload from "./modules/upload.js";

import Clubs from "./modules/clubs";
import coffees from "./modules/coffee";
import Restaurants from "./modules/restaurants";
import Accomodations from "./modules/accomodations";
import Rooms from "./modules/rooms";
import Cars from "./modules/cars";
import clubProducts from "./modules/clubProducts";
import coffeeProducts from "./modules/coffeeProducts";
import restaurantProducts from "./modules/restaurantProducts";
import hotelProducts from "./modules/hotelProducts";
import clients from "./modules/clients";
import others from "./modules/others";


Vue.use(Vuex);
export default new Vuex.Store({
  state: () => ({
    sidebar: true,
    eventBus: new Vue(),
    access_token: null,
    loggedClient: localStorage.getItem('client'),
    writter_access_token: localStorage.getItem('writter_access_token'),
    BASE_URL: BASE_URL,
    UPLOAD_BASE_URL: UPLOAD_BASE_URL,
    main_loader: false,
    sidebarShow: "responsive",
    sidebarMinimize: false,
  }),
  mutations: {
    ["SET_TOKEN"]: (state, payload) => {
      state.access_token = payload;
    },
    ["START_LOADER"]: (state) => {
      state.main_loader = true;
    },
    ["STOP_LOADER"]: (state) => {
      state.main_loader = false;
    },
    toggleSidebarDesktop(state) {
      const sidebarOpened = [true, "responsive"].includes(state.sidebarShow);
      state.sidebarShow = sidebarOpened ? false : "responsive";
    },
    toggleSidebarMobile(state) {
      const sidebarClosed = [false, "responsive"].includes(state.sidebarShow);
      state.sidebarShow = sidebarClosed ? true : "responsive";
    },
    set(state, [variable, value]) {
      state[variable] = value;
    },
  },
  getters: {
    getUserAccessToken(state) {
      return state.access_token;
    },
  },
  actions: {},
  modules: {
    Upload,
    Clubs,
    coffees,
    Restaurants,
    Accomodations,
    Rooms,
    Cars,
    clubProducts,
    coffeeProducts,
    restaurantProducts,
    hotelProducts,
    clients,
    others,
  },
});
