import Vue from 'vue'
import Vuex from 'vuex'
import editpass from './editpass'

// import plugins from './plugins'

Vue.use(Vuex)

export default new Vuex.Store({
    modules: {
        editpass
      }
});