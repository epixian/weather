import VueRouter from 'vue-router';

let routes = [
    {
        path: '/',
        component: () => import('./views/Locations')
    },
    {
        path: '/weatherlocations',
        component: () => import('./views/WeatherLocations')
    }
    // {
    //     path: '/login',
    //     component: () => import('./views/Login')
    // },
];

export default new VueRouter({
    routes,
    linkActiveClass: 'is-active'
});