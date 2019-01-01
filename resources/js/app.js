require('./bootstrap');

import Vue from 'vue'

import store from './store/store'

import User from './components/chat/Users'
import Messages from './components/chat/Messages'
import Chat from './components/chat/Chat'

 new Vue({
    store,
    el: '#app',
    components:{
        User,Messages,Chat
    }
});
