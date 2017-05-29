import Vue from 'vue';
import VueRouter from 'vue-router';
import auth from '../store/auth';

import Home from '../views/Home.vue';
import Register from '../views/Auth/Register.vue';
import Login from '../views/Auth/Login.vue';
import Index from '../views/Adverts/Index.vue';
import NewAdvert from '../views/Adverts/NewAdvert.vue';
import ShowAdvert from '../views/Adverts/Show.vue';

Vue.use(VueRouter);

const authNeededRoute = function (to, from, next) {
    auth.initialize();
    if (auth.state.api_token && auth.state.user_id) {
        return next();
    }
    return next(from.path);
};

const noNeedIfLogedIn = function (to, from, next) {
    if (auth.state.api_token && auth.state.user_id) {
        return next(from.path);
    }
    return next();
};


const router = new VueRouter({
    routes: [
        // MAIN PAGE ROUTE
        {
            path: '/',
            component: Home
        },

        // AUTH ROUTES
        {
            path: '/register',
            component: Register,
            beforeEnter: (to, from, next) => {
                noNeedIfLogedIn(to, from, next);
            }
        },
        {
            path: '/login',
            component: Login,
            beforeEnter: (to, from, next) => {
                noNeedIfLogedIn(to, from, next);
            }
        },

        // ADVERTISMENT ROUTES
        {
            path: '/ads',
            'name': 'ADVERTS',
            component: Index,
        },
        {
            path: '/ad/new',
            component: NewAdvert,
            beforeEnter: (to, from, next) => {
                authNeededRoute(to, from, next);
            }
        },
        {
          path: '/ad/:id',
          name: 'SHOWADVERT',
          component: ShowAdvert
        }
    ]
});

export default router;
