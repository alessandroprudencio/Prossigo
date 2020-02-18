import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import ContactForm from '../components/contact_form/index'
import ContactList from '../components/contact_list/index'

export default new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'contactForm',
            component: ContactForm
        },
        {
            path: '/contact-list',
            name: 'contactList',
            component: ContactList
        },
    ],
})
