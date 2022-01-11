import { CONTACT_NOW } from "../actions/others";

import { CONTACT_NOW_URL } from "../variables";

import axios from "axios";

const state = {};
const mutations = {};
const getters = {};
const actions = {
  [CONTACT_NOW]: (state, payload) => {
    return axios({
      url: CONTACT_NOW_URL,
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
