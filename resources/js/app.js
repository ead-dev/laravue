/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import './bootstrap';
import 'bootstrap/dist/css/bootstrap.css'
import "../Eterna/assets/vendor/animate.css/animate.min.css"
import "../Eterna/assets/vendor/bootstrap/css/bootstrap.min.css"
import "../Eterna/assets/vendor/bootstrap-icons/bootstrap-icons.css"
import "../Eterna/assets/vendor/boxicons/css/boxicons.min.css"
import "../Eterna/assets/vendor/glightbox/css/glightbox.min.css"
import "../Eterna/assets/vendor/swiper/swiper-bundle.min.css"
import "./assets/css/custom.css"
//import 'bootstrap-vue/dist/bootstrap-vue.css'
import '../Eterna/assets/css/style.css'
import "../Eterna/assets/vendor/purecounter/purecounter_vanilla.js"
import "../Eterna/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"
import "../Eterna/assets/vendor/glightbox/js/glightbox.min.js"
import "../Eterna/assets/vendor/isotope-layout/isotope.pkgd.min.js"
import "../Eterna/assets/vendor/swiper/swiper-bundle.min.js"
import "../Eterna/assets/vendor/waypoints/noframework.waypoints.js"
import "../Eterna/assets/vendor/php-email-form/validate.js"
import '../Eterna/assets/js/main'

import { createApp } from 'vue';
import Router from './route'
import store from '@/store'

import '../sass/app.scss'

/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */
import App from "./components/App.vue";
/*
createApp(App)
    .use(Router)
    .use(store)
    .mount('#app') */


store.dispatch("auth/attempt", localStorage.getItem("token")).then(() => {
    createApp(App)
    .use(Router)
    .use(store)
    .mount('#app')
});
//import ExampleComponent from './components/ExampleComponent.vue';
//app.component('example-component', ExampleComponent);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// Object.entries(import.meta.glob('./**/*.vue', { eager: true })).forEach(([path, definition]) => {
//     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
// });

/**
 * Finally, we will attach the application instance to a HTML element with
 * an "id" attribute of "app". This element is included with the "auth"
 * scaffolding. Otherwise, you will need to add an element yourself.
 */

