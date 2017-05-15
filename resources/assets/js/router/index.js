import Vue from 'vue';
import VueRouter from 'vue-router';
import Home from '../views/Home.vue';
import Register from '../views/Auth/Register.vue';
import Login from '../views/Auth/Login.vue';
import Index from '../views/Adverts/Index.vue';

Vue.use(VueRouter);

const router = new VueRouter({
    routes: [
        {path: '/', component: Home},
        {path: '/register', component: Register},
        {path: '/login', component: Login},
        {path: '/ads', component: Index}
    ]
});

export default router;
