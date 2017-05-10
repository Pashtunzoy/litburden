import Vue from 'vue';
import router from './router';
import App from './App.vue';
import Navbar from './components/Navbar.vue';

Vue.component('Navbar', Navbar);
const app = new Vue({
    el: '#app',
    template: `<app></app>`,
    components: { App },
    router
});
