/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

import Vue from 'vue';
import Swal from 'sweetalert2';
import Chartist from 'chartist';

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    onOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})

window.Swal = Swal;
window.Toast = Toast;
window.Chartist = Chartist;

// vue router
import VueRouter from 'vue-router';
Vue.use(VueRouter);
import routes from './routes';

const router = new VueRouter({
    mode: 'history',
    routes
});

// Laravel Vue Form
import { Form, HasError, AlertError } from 'vform';
window.Form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

// vue progress bar
import VueProgressBar from 'vue-progressbar'
Vue.use(VueProgressBar, {
    color: '#fb503b',
    failedColor: 'red',
    height: '3px'
});

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('pagination', require('laravel-vue-pagination'));

// import Breadcrumb from './Breadcrumb';
// Vue.prototype.$breadcrumb = new Breadcrumb();

// Vue.component('Breadcrumb', require('./components/Breadcrumb.vue').default);

import VueBreadcrumbs from 'vue-2-breadcrumbs';

Vue.use(VueBreadcrumbs, {
    template:
        `<nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
            <li class="breadcrumb-item">
                <a href="#">
                <svg
                    class="icon icon-xxs"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                    ></path>
                </svg>
                </a>
            </li>
            <li v-for="(crumb, key) in $breadcrumbs" v-if="crumb.meta.breadcrumb" :key="key"  class="breadcrumb-item active" aria-current="page">
                {{ crumb.meta.breadcrumb }}
            </li>
            </ol>
        </nav>`
});

const app = new Vue({
    el: '#app',
    router,
    // linkActiveClass: "active",
    // linkExactActiveClass: "exact-active",
});
