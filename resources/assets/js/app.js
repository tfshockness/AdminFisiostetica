/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import addProcedure from './components/admin/addProcedure.vue';
import example from './components/Example.vue';

// Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app',

    data: {
        isThere: false
    },

    methods: {
        showAdd() {
            this.isThere = true;
        },
        closing() {
            this.isThere = false;
        }
    },

    components: {
        'add-procedure': addProcedure,
        'example': example
    }
});