import { GET_COFFEE, ADD_COFFEE, UPDATE_COFFEE, DELETE_COFFEE } from "../actions/coffee";

import { GET_COFFEE_URL, ADD_COFFEE_URL, UPDATE_COFFEE_URL, DELETE_COFFEE_URL } from "../variables";

import axios from "axios";

const state = {};
const mutations = {};
const getters = {};
const actions = {
  [GET_COFFEE]: (state) => {
    return axios({
      url: GET_COFFEE_URL,
      method: "GET",
    });
  },
  [ADD_COFFEE]: (state, payload) => {
    return axios({
      url: ADD_COFFEE_URL,
      method: "POST",
      data: payload
    });
  },
  [UPDATE_COFFEE]: (state, payload) => {
    return axios({
      url: UPDATE_COFFEE_URL,
      method: "POST",
      data: payload
    });
  },
  [DELETE_COFFEE]: (state, payload) => {
    return axios({
      url: DELETE_COFFEE_URL + payload,
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
