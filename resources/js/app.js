
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';

window.Vue.use(VueRouter);

import App from './views/App';
import Hello from './views/Hello';
import Order from './views/Order';

const router = new VueRouter({
	mode: 'history',
	routes: [
		{
			path: '/order',
			name: 'order',
			component: Order,
		},
		{
			path: '/hello',
			name: 'hello',
			component: Hello,
		},
	]
});

const app = new Vue({
	el: '#app',
	components: { App },
	router,
});