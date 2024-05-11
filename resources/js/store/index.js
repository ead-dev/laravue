import { createStore } from 'vuex'
import createPersistedState from 'vuex-persistedstate'
import auth from '@/store/auth'

const store = createStore({
    plugins:[
        createPersistedState({
            storage: window.localStorage,
            paths: ['']
        })
    ],
    state: {

    },
    getters: {

    },
    mutations: {

    },
    actions: {

    },
    modules:{
        auth
    }
})

export default store

/*export default new Vuex.Store({
    plugins: [createPersistedState({
        storage: window.localStorage,
        paths: ['']
    })],
    state: {

    },
    getters: {

    },
    mutations: {

    },
    actions: {

    },
    modules: {
        auth,
    }

}); */
