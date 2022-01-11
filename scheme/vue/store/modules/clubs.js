import { GET_CLUBS, ADD_CLUBS, UPDATE_CLUBS, DELETE_CLUBS, GET_TOP_CLUBS, GET_SINGLE_CLUB } from "../actions/clubs";

import { GET_CLUBS_URL, ADD_CLUBS_URL, UPDATE_CLUBS_URL, DELETE_CLUBS_URL, GET_TOP_CLUBS_URL, GET_SINGLE_CLUB_URL } from "../variables";

import axios from "axios";

const state = {};
const mutations = {};
const getters = {};
const actions = {
  [GET_CLUBS]: (state) => {
    return axios({
      url: GET_CLUBS_URL,
      method: "GET",
    });
  },
  [ADD_CLUBS]: (state, payload) => {
    return axios({
      url: ADD_CLUBS_URL,
      method: "POST",
      data: payload
    });
  },
  [UPDATE_CLUBS]: (state, payload) => {
    return axios({
      url: UPDATE_CLUBS_URL,
      method: "POST",
      data: payload
    });
  },
  [DELETE_CLUBS]: (state, payload) => {
    return axios({
      url: DELETE_CLUBS_URL + payload,
      method: "GET",
    });
  },
  [GET_TOP_CLUBS]: (state) => {
    return axios({
      url: GET_TOP_CLUBS_URL,
      method: "GET",
    });
  },
  [GET_SINGLE_CLUB]: (state, payload) => {
    return axios({
      url: GET_SINGLE_CLUB_URL + payload,
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
