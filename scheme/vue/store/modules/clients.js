import {
  CLIENT_LOGIN,
  GET_CLIENTS,
  ADD_CLIENT,
  UPDATE_CLIENT,
  DELETE_CLIENT,
} from "../actions/clients";

import {
  CLIENT_LOGIN_URL,
  GET_CLIENTS_URL,
  ADD_CLIENT_URL,
  UPDATE_CLIENT_URL,
  DELETE_CLIENT_URL,
} from "../variables";

import axios from "axios";

const state = {};
const mutations = {};
const getters = {};
const actions = {
  [CLIENT_LOGIN]: (state, payload) => {
    return axios({
      url: CLIENT_LOGIN_URL,
      method: "POST",
      data: payload,
    });
  },
  [GET_CLIENTS]: (state) => {
    return axios({
      url: GET_CLIENTS_URL,
      method: "GET",
    });
  },
  [ADD_CLIENT]: (state, payload) => {
    return axios({
      url: ADD_CLIENT_URL,
      method: "POST",
      data: payload,
    });
  },
  [UPDATE_CLIENT]: (state, payload) => {
    return axios({
      url: UPDATE_CLIENT_URL,
      method: "POST",
      data: payload,
    });
  },
  [DELETE_CLIENT]: (state, payload) => {
    return axios({
      url: DELETE_CLIENT_URL + payload,
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
