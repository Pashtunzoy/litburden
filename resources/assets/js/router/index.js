import Vue from 'vue';
import VueRouter from 'vue-router';
import Register from '../views/Register.vue';

Vue.use(VueRouter);

const router = new VueRouter({
    routes: [
        {path: '/register', component: Register}
    ]
});

export default router;
