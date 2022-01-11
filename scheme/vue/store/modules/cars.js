import { GET_CARS, ADD_CARS, UPDATE_CARS, DELETE_CARS } from "../actions/cars";

import {
  GET_CARS_URL,
  ADD_CARS_URL,
  UPDATE_CARS_URL,
  DELETE_CARS_URL,
} from "../variables";

import axios from "axios";

const state = {};
const mutations = {};
const getters = {};
const actions = {
  [GET_CARS]: (state) => {
    return axios({
      url: GET_CARS_URL,
      method: "GET",
    });
  },
  [ADD_CARS]: (state, payload) => {
    return axios({
      url: ADD_CARS_URL,
      method: "POST",
      data: payload,
    });
  },
  [UPDATE_CARS]: (state, payload) => {
    return axios({
      url: UPDATE_CARS_URL,
      method: "POST",
      data: payload,
    });
  },
  [DELETE_CARS]: (state, payload) => {
    return axios({
      url: DELETE_CARS_URL + payload,
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
