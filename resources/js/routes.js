import VueRouter from 'vue-router';

let routes = [
    // default route
    {
        path: '/',
        component: () => import('./views/Customers')
    },

    // customers
    // {
    //     path: '/customers',
    //     component: () => import('./views/Customers')          
    // },
    // {
    //     path: '/customers/:id',
    //     component: () => import('./views/Customer'),
    //     children: [
    //         { path: '', component: () => import('./views/CustomerHome') },
    //         { path: 'locations', component: () => import('./views/CustomerLocations') }
    //     ]
    // },

    // locations
    {
        path: '/locations',
        component: () => import('./views/Locations')
    },
    {
        path: '/locations/:id',
        component: () => import('./views/Location')
    },

    // weather locations
    {
        path: '/weatherlocations',
        component: () => import('./views/WeatherLocations')
    },
    {
        path: '/weatherlocations/:id',
        component: () => import('./views/WeatherLocation')
    },

];

export default new VueRouter({
    routes,
    linkActiveClass: 'is-active'
});