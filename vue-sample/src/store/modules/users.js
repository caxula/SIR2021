import axios from "axios";

const state = {
  data: [],
};

const getters = {
  // getAll: (state) => state.data
  getAll: (state) => {
    return state.data;
  },
  getByGender: (state) => (gender) =>
    state.data.filter((u) => u.gender === gender),
};

const actions = {
  getRandomUsers({ commit }) {
    axios.get("https://randomuser.me/api/?results=5").then((res) => {
      commit("setData", res.data.results);
    });
  },
  removeUser: ({ commit }, uuid) => commit("remove", uuid),
};

const mutations = {
  setData(state, data) {
    state.data = [...state.data, ...data];
  },
  remove(state, id) {
    state.data = state.data.filter((user) => user.login.uuid !== id);
  },
};

export default {
  getters,
  actions,
  mutations,
  state,
  namespaced: true,
};
