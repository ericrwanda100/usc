import { GET_HOTEL_PRODUCTS, ADD_HOTEL_PRODUCTS, UPDATE_HOTEL_PRODUCTS, DELETE_HOTEL_PRODUCTS, GET_GROUPEDHOTEL_PRODUCTS } from "../actions/hotelProducts";

import { GET_HOTEL_PRODUCTS_URL, ADD_HOTEL_PRODUCTS_URL, UPDATE_HOTEL_PRODUCTS_URL, DELETE_HOTEL_PRODUCTS_URL, GET_GROUPEDHOTEL_PRODUCTS_URL } from "../variables";

import axios from "axios";

const state = {};
const mutations = {};
const getters = {};
const actions = {
  [GET_HOTEL_PRODUCTS]: (state, payload) => {
    return axios({
      url: GET_HOTEL_PRODUCTS_URL + payload,
      method: "GET",
    });
  },
  [GET_GROUPEDHOTEL_PRODUCTS]: (state, payload) => {
    return axios({
      url: GET_GROUPEDHOTEL_PRODUCTS_URL + payload,
      method: "GET",
    });
  },
  [ADD_HOTEL_PRODUCTS]: (state, payload) => {
    return axios({
      url: ADD_HOTEL_PRODUCTS_URL,
      method: "POST",
      data: payload
    });
  },
  [UPDATE_HOTEL_PRODUCTS]: (state, payload) => {
    return axios({
      url: UPDATE_HOTEL_PRODUCTS_URL,
      method: "POST",
      data: payload
    });
  },
  [DELETE_HOTEL_PRODUCTS]: (state, payload) => {
    return axios({
      url: DELETE_HOTEL_PRODUCTS_URL + payload,
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
