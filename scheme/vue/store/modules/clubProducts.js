import { GET_CLUB_PRODUCTS, ADD_CLUB_PRODUCTS, UPDATE_CLUB_PRODUCTS, DELETE_CLUB_PRODUCTS } from "../actions/clubProducts";

import { GET_CLUB_PRODUCTS_URL, ADD_CLUB_PRODUCTS_URL, UPDATE_CLUB_PRODUCTS_URL, DELETE_CLUB_PRODUCTS_URL } from "../variables";

import axios from "axios";

const state = {};
const mutations = {};
const getters = {};
const actions = {
  [GET_CLUB_PRODUCTS]: (state, payload) => {
    return axios({
      url: GET_CLUB_PRODUCTS_URL + payload,
      method: "GET",
    });
  },
  [ADD_CLUB_PRODUCTS]: (state, payload) => {
    return axios({
      url: ADD_CLUB_PRODUCTS_URL,
      method: "POST",
      data: payload
    });
  },
  [UPDATE_CLUB_PRODUCTS]: (state, payload) => {
    return axios({
      url: UPDATE_CLUB_PRODUCTS_URL,
      method: "POST",
      data: payload
    });
  },
  [DELETE_CLUB_PRODUCTS]: (state, payload) => {
    return axios({
      url: DELETE_CLUB_PRODUCTS_URL + payload,
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
