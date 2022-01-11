import { GET_RESTAURANTS, ADD_RESTAURANTS, UPDATE_RESTAURANTS, DELETE_RESTAURANTS } from "../actions/restaurants";

import { GET_RESTAURANTS_URL, ADD_RESTAURANTS_URL, UPDATE_RESTAURANTS_URL, DELETE_RESTAURANTS_URL } from "../variables";

import axios from "axios";

const state = {};
const mutations = {};
const getters = {};
const actions = {
  [GET_RESTAURANTS]: (state) => {
    return axios({
      url: GET_RESTAURANTS_URL,
      method: "GET",
    });
  },
  [ADD_RESTAURANTS]: (state, payload) => {
    return axios({
      url: ADD_RESTAURANTS_URL,
      method: "POST",
      data: payload
    });
  },
  [UPDATE_RESTAURANTS]: (state, payload) => {
    return axios({
      url: UPDATE_RESTAURANTS_URL,
      method: "POST",
      data: payload
    });
  },
  [DELETE_RESTAURANTS]: (state, payload) => {
    return axios({
      url: DELETE_RESTAURANTS_URL + payload,
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
