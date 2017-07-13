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
import showAppointment from './components/admin/showAppointment.vue';
import appSearch from './components/admin/appSearch.vue';
import indexSearch from './components/admin/indexSearch.vue';


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
        showAdd: function() {
            this.isThere = true;
        },
        closing: function() {
            this.isThere = false;
        },
        searchCust: function() {
            if (this.search.length >= 3) {
                var self = this;
                axios.get('/clientes/search', {
                        params: {
                            search: self.search
                        }
                    })
                    .then(function(response) {
                        if (response.data.length === 0) {
                            self.results = [{ first_name: "Nenum cliente foi", last_name: "encontrado." }];
                            self.showsearch = true;
                        } else {
                            self.results = response.data;
                            self.showsearch = true;
                        }

                    }).catch(function(error) {
                        console.log(error);
                    });
            } else {
                this.showsearch = false;
            }

        },
        setCustomerId: function(id, first_name, last_name) {
            this.customer_id = id;
            this.search = first_name + ' ' + last_name;
            this.showsearch = false;
        }
    },

    components: {
        'app-add-procedure': addProcedure,
        'app-show-appoint': showAppointment,
        'app-search': appSearch,
        'app-index-search': indexSearch
    }
});