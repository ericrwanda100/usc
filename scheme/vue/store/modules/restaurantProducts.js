import { GET_RESTAURANT_PRODUCTS, ADD_RESTAURANT_PRODUCTS, UPDATE_RESTAURANT_PRODUCTS, DELETE_RESTAURANT_PRODUCTS } from "../actions/restaurantProducts";

import { GET_RESTAURANT_PRODUCTS_URL, ADD_RESTAURANT_PRODUCTS_URL, UPDATE_RESTAURANT_PRODUCTS_URL, DELETE_RESTAURANT_PRODUCTS_URL } from "../variables";

import axios from "axios";

const state = {};
const mutations = {};
const getters = {};
const actions = {
  [GET_RESTAURANT_PRODUCTS]: (state, payload) => {
    return axios({
      url: GET_RESTAURANT_PRODUCTS_URL + payload,
      method: "GET",
    });
  },
  [ADD_RESTAURANT_PRODUCTS]: (state, payload) => {
    return axios({
      url: ADD_RESTAURANT_PRODUCTS_URL,
      method: "POST",
      data: payload
    });
  },
  [UPDATE_RESTAURANT_PRODUCTS]: (state, payload) => {
    return axios({
      url: UPDATE_RESTAURANT_PRODUCTS_URL,
      method: "POST",
      data: payload
    });
  },
  [DELETE_RESTAURANT_PRODUCTS]: (state, payload) => {
    return axios({
      url: DELETE_RESTAURANT_PRODUCTS_URL + payload,
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
