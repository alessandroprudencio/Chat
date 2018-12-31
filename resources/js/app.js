require('./bootstrap');

window.Vue = require('vue');

import store from './store/store'

Vue.component('chat-component', require('./components/chat/Chat'));
Vue.component('users-component', require('./components/chat/Users'));
Vue.component('message-component', require('./components/chat/Messages'));

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    store,
    el: '#app'
});
