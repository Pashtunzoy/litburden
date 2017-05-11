import Vue from 'vue';
import router from './router';
import App from './App.vue';
import Navbar from './components/Navbar.vue';
import SearchBar from './components/SearchBar.vue';
import Footer from './components/Footer.vue';

Vue.component('Navbar', Navbar);
Vue.component('SearchBar', SearchBar);
Vue.component('Footer', Footer);

const app = new Vue({
    el: '#app',
    template: `<app></app>`,
    components: { App },
    router
});
