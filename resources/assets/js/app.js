import Vue from 'vue';
import router from './router';
import App from './App.vue';
import Navbar from './components/Navbar.vue';
import SearchBar from './components/SearchBar.vue';
import MainContent from './components/MainContent.vue';
import Footer from './components/Footer.vue';

const app = new Vue({
    el: '#app',
    template: `<app></app>`,
    components: { App },
    router
});
