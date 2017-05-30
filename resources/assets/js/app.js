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
import showAppointment from './components/admin/showAppointment.vue';
import appSearch from './components/admin/appSearch.vue';

// Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app',
    data: {
        isThere: false,
        search: '',
        showsearch: false,
        results: {},
        customer_id: 0
    },

    methods: {
        showAdd() {
            this.isThere = true;
        },
        closing() {
            this.isThere = false;
        },
        searchCust: function() {
            if (this.search.length >= 3) {
                let self = this;
                axios.get('/clientes/search', {
                        params: {
                            search: self.search
                        }
                    })
                    .then(function(response) {
                        self.results = response.data;
                        console.log(response.data);
                        self.showsearch = true;
                    }).catch(function(error) {
                        console.log(error);
                    });
            } else {
                this.showsearch = false;
            }

        },
        setCustomerId(id, first_name, last_name) {
            console.log("at least I am here");
            this.customer_id = id;
            this.search = first_name + ' ' + last_name;
            this.showsearch = false;
        }
    },

    components: {
        'app-add-procedure': addProcedure,
        'app-show-appoint': showAppointment,
        'app-search': appSearch
    }
});