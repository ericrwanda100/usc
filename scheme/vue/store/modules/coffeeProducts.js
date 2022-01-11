import { GET_COFFEE_PRODUCTS, ADD_COFFEE_PRODUCTS, UPDATE_COFFEE_PRODUCTS, DELETE_COFFEE_PRODUCTS } from "../actions/coffeeProducts";

import { GET_COFFEE_PRODUCTS_URL, ADD_COFFEE_PRODUCTS_URL, UPDATE_COFFEE_PRODUCTS_URL, DELETE_COFFEE_PRODUCTS_URL } from "../variables";

import axios from "axios";

const state = {};
const mutations = {};
const getters = {};
const actions = {
  [GET_COFFEE_PRODUCTS]: (state, payload) => {
    return axios({
      url: GET_COFFEE_PRODUCTS_URL + payload,
      method: "GET",
    });
  },
  [ADD_COFFEE_PRODUCTS]: (state, payload) => {
    return axios({
      url: ADD_COFFEE_PRODUCTS_URL,
      method: "POST",
      data: payload
    });
  },
  [UPDATE_COFFEE_PRODUCTS]: (state, payload) => {
    return axios({
      url: UPDATE_COFFEE_PRODUCTS_URL,
      method: "POST",
      data: payload
    });
  },
  [DELETE_COFFEE_PRODUCTS]: (state, payload) => {
    return axios({
      url: DELETE_COFFEE_PRODUCTS_URL + payload,
      method: "GET",
    });
  },
};

export default {
  mutations,
  actions,
  getters,
  state,
};
