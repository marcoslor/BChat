require('./bootstrap');

window.Vue = require("vue");

Echo.private(`chat.${window.location.pathname.split("/").pop()}`)
    .listen('MessageSent', (e) => {
        console.log('Info ' + e.update);
    });

import ChatMessages from "./Components/ChatMessages";
import ChatForm from "./Components/SendMessage";
import CreateChat from "./Components/CreateChat";

Vue.component('chat-messages', ChatMessages);
Vue.component('chat-form', ChatForm);
Vue.component('create-chat', CreateChat);

const app = new Vue({
    el: '#app',

    data: {
        messages: []

    },

    created() {
        this.fetchMessages();
    },

    methods: {
        fetchMessages() {
            axios.get(window.location.pathname+'/messages').then(response => {
                this.messages = response.data;
            });
        },

        addMessage(message) {
            this.messages.push(message);

            axios.post(window.location.pathname+'/messages', message).then(response => {
                console.log(response.data);
            });
        },

        createChat(){

        }
    }
});
