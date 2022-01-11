import {
  GET_ACCOMODATION,
  ADD_ACCOMODATION,
  UPDATE_ACCOMODATION,
  DELETE_ACCOMODATION,
  GET_TOP_ACCOMODATION,
  GET_ACCOMODATION_GROUPED,
  GET_SINGLE_ACCOMODATION,
  UPDATE_GYM,
  UPDATE_POOL,
  UPDATE_HALL,
  UPDATE_RESTAURANT,
} from "../actions/accomodations";

import {
  GET_ACCOMODATION_URL,
  ADD_ACCOMODATION_URL,
  UPDATE_ACCOMODATION_URL,
  DELETE_ACCOMODATION_URL,
  GET_TOP_ACCOMODATION_URL,
  GET_ACCOMODATION_GROUPED_URL,
  GET_SINGLE_ACCOMODATION_URL,
  UPDATE_GYM_URL,
  UPDATE_POOL_URL,
  UPDATE_HALL_URL,
  UPDATE_RESTAURANT_URL,
} from "../variables";

import axios from "axios";

const state = {};
const mutations = {};
const getters = {};
const actions = {
  [GET_ACCOMODATION]: (state) => {
    return axios({
      url: GET_ACCOMODATION_URL,
      method: "GET",
    });
  },
  [ADD_ACCOMODATION]: (state, payload) => {
    return axios({
      url: ADD_ACCOMODATION_URL,
      method: "POST",
      data: payload,
    });
  },
  [UPDATE_ACCOMODATION]: (state, payload) => {
    return axios({
      url: UPDATE_ACCOMODATION_URL,
      method: "POST",
      data: payload,
    });
  },
  [DELETE_ACCOMODATION]: (state, payload) => {
    return axios({
      url: DELETE_ACCOMODATION_URL + payload,
      method: "GET",
    });
  },
  [GET_TOP_ACCOMODATION]: (state) => {
    return axios({
      url: GET_TOP_ACCOMODATION_URL,
      method: "GET",
    });
  },
  [GET_ACCOMODATION_GROUPED]: (state) => {
    return axios({
      url: GET_ACCOMODATION_GROUPED_URL,
      method: "GET",
    });
  },
  [GET_SINGLE_ACCOMODATION]: (state, payload) => {
    return axios({
      url: GET_SINGLE_ACCOMODATION_URL + payload,
      method: "GET",
    });
  },
  [UPDATE_GYM]: (state, payload) => {
    return axios({
      url: UPDATE_GYM_URL,
      method: "POST",
      data: payload,
    });
  },
  [UPDATE_POOL]: (state, payload) => {
    return axios({
      url: UPDATE_POOL_URL,
      method: "POST",
      data: payload,
    });
  },
  [UPDATE_HALL]: (state, payload) => {
    return axios({
      url: UPDATE_HALL_URL,
      method: "POST",
      data: payload,
    });
  },
  [UPDATE_RESTAURANT]: (state, payload) => {
    return axios({
      url: UPDATE_RESTAURANT_URL,
      method: "POST",
      data: payload,
    });
  },
};

export default {
  mutations,
  actions,
  getters,
  state,
};
