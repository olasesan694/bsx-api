/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('chat-app', require('./components/ChatApp.vue').default);
Vue.component('invite-form', require('./components/invites/InviteForm.vue').default);
Vue.component('accept-button', require('./components/invites/AcceptButton.vue').default);

Vue.component('connect-view', require('./components/ConnectView.vue').default);
// Vue.component('discuss', require('./components/invites/AcceptButton.vue').default);
// Vue.component('discussion', require('./components/invites/AcceptButton.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
//     el: '#app',
// });

new Vue ({
    el: '#app',
    data: { 
        // default / base values
    },
    methods: {
        url_info: function () {
            var customerURL =  window.location.search.slice(1);  
            getUrl = decodeURIComponent(customerURL);
            getUrl = getUrl.replace(/=/g, '": "');
            getUrl = getUrl.replace(/&/g, '", "');
            getUrl = '{"'+getUrl+'"}';
            var obj = JSON.parse(getUrl);
            return obj;
        },
        storeID: function () {
            return url_info().origin;
        },
        companyName: function () {
            return url_info().incName.toUpperCase();
        },
        productImage: function () {
            return url_info().prodImage;
        },
        productTitle: function () {
            return url_info().prodTitle;
        },
        productPrice: function () {
            return url_info().prodPrice;
        },
        getStarted: function () {
            var invitation = "https://connect.brisebox.com/invite"; 
            var url_details = window.location.search;
            var invitation_url = invitation + url_details;
            window.location.href = invitation_url;
            return window.location.href;
        }
    }
});

