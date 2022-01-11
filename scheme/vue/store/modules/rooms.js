import { GET_ROOMS, ADD_ROOMS, UPDATE_ROOMS, DELETE_ROOMS } from "../actions/rooms";

import { GET_ROOMS_URL, ADD_ROOMS_URL, UPDATE_ROOMS_URL, DELETE_ROOMS_URL } from "../variables";

import axios from "axios";

const state = {};
const mutations = {};
const getters = {};
const actions = {
  [GET_ROOMS]: (state, payload) => {
    return axios({
      url: GET_ROOMS_URL + payload,
      method: "GET",
    });
  },
  [ADD_ROOMS]: (state, payload) => {
    return axios({
      url: ADD_ROOMS_URL,
      method: "POST",
      data: payload
    });
  },
  [UPDATE_ROOMS]: (state, payload) => {
    return axios({
      url: UPDATE_ROOMS_URL,
      method: "POST",
      data: payload
    });
  },
  [DELETE_ROOMS]: (state, payload) => {
    return axios({
      url: DELETE_ROOMS_URL + payload,
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
