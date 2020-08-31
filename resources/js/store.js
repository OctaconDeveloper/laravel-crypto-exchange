import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)
import createPersistedState from "vuex-persistedstate";

const store = new Vuex.Store({
    plugins: [createPersistedState()],
  // ...
});
