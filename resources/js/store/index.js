import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

const resource = 'api/contact'

export default new Vuex.Store({
    state: {
        ip_address: "",
        contacts: {
            data: []
        }
    },

    getters: {
        ipAddress(state) {
            return state.ip_address;
        },
    },

    mutations: {
        setIpAddress(state, payload) {
            state.ip_address = payload
        },
        setContacts(state, payload) {
            state.contacts = payload
        }
    },

    actions: {
        setIpAddress(context) {
            $.getJSON('https://api.ipify.org?format=json', function (data) {
                context.commit('setIpAddress', data.ip)
            });
        },
        loadContacts({ commit }, page = 1) {
            axios.get(`${resource}?page=` + page)
                .then(res => commit('setContacts', res.data))
                .catch(error => console.log(error))
        },
        saveContact({ commit }, payload) {
            // this.message.sender_ip = this.$store.getters.ipAddress;
            
            axios.post(`${resource}`, payload, {
                headers: {
                    'Content-Type': "multipart/form-data; charset=utf-8; boundary=" + Math.random().toString().substr(2)
                }
            }).then(res => {
                iziToast.success({
                    title: "OK ",
                    icon: 'fa fa-envelope',
                    message: res.data.message
                })
            })
                .catch(error => {
                    iziToast.error({
                        title: "OK ",
                        icon: 'fa fa-envelope',
                        message: error.response
                    })
                })

        },
    }
})