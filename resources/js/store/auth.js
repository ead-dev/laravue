import axios from "axios";
export default {
    namespaced: true,
    state: {
        token: null,
        user: null,
        entreprise:null,
        authenticated:false,
    },
    getters: {
        authenticated(state) {
            return state.authenticated;
        },
        user(state) {
            return state.user;
        },
        entreprise(state){
            return state.entreprise
        }
    },
    mutations: {
        SET_TOKEN(state, token) {
            state.token = token;
        },
        SET_USER(state, data) {
            state.user = data;
        },
        SET_AUTHENTICATED(state,aut){
            state.authenticated = aut;
        },
        SET_ENTREPRISE(state,ent){
            state.entreprise = ent;
        },

    },
    actions: {
        async login({commit, dispatch},user) {
            //await axios.get('/sanctum/csrf-cookie')
           // console.log(user);
            await axios.post('/api/login',user).then(async(resp)=>{
                //console.log(resp.data.authorisation.token);
                let token = resp.data.authorisation.token;
                commit('SET_TOKEN',token)
                axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;
                localStorage.setItem('token', token);
                await axios.get('/api/user').then((response)=>{

                        //let response = await axios.get('/api/user');
                        console.log(response)
                        commit('SET_USER', response.data.user);
                        commit('SET_ENTREPRISE', response.data.entreprise);
                        commit('SET_AUTHENTICATED', true);
                        return response.data
                        //return response;
                        //this.$emit('updateAuth',$event,true);
                        //this.$router.push({name:'dashboard'});

                }).catch((e)=> {
                    commit('SET_TOKEN', null);
                    commit('SET_USER', null);
                    commit('SET_ENTREPRISE', null);
                    commit('SET_AUTHENTICATED', false);
                });

            })

            //let response = await axios.post("login", credentials)
            //console.log(response.authorisation.token)
           /// dispatch('attempt', response.authorisation.token);

        },
        async attempt({ commit, state }, token) {
            //console.log(token)
            if (token) {
                commit('SET_TOKEN', token)
                //console.log("Token setted")
            }
            //console.log(state.token)
            if (!state.token) {
                return
            }
            //header will be added by subcriber
            try {
                axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;
                localStorage.setItem('token', token);
                let response = await axios.get('/api/user');
                console.log(response)
                commit('SET_USER', response.data.user);
                commit('SET_ENTREPRISE', response.data.entreprise);
                commit('SET_AUTHENTICATED', true);
                //return response;
                //this.$emit('updateAuth',$event,true);
                //this.$router.push({name:'dashboard'});
            } catch (e) {
                commit('SET_TOKEN', null);
                commit('SET_USER', null);
                commit('SET_ENTREPRISE', null);
                commit('SET_AUTHENTICATED', false);
            }

            return;

        },
        async signOut({ commit }) {
            return axios.post('logout').then(() => {
                commit('SET_USER', null)
                commit('SET_TOKEN', null)
                commit('SET_ENTREPRISE', null)
                commit('SET_AUTHENTICATED', false);
                localStorage.removeItem('token');
            }).catch((err)=>{
                console.log(err);
            }).finally(()=>{
               // this.$router.push({name:'login'});
            });
        }


    }
}
