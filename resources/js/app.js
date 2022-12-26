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

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('atc-component', require('./components/addtocartbuttonComponent.vue').default);
Vue.component('cart', require('./components/cart.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
// Vue.prototype.$hostname = "http://" + window.location.hostname + "/seinnandaw/public";
// Vue.prototype.$hostname = "https://" + window.location.hostname ;
Vue.prototype.$hostname = "http://" + window.location.hostname ;


const app = new Vue({
    el: '#app',
    data:function (){
        return {
            addtocartcount:0
        }
    },
   async mounted() {
        if(window.authuser == 'no'){
            this.addtocartcount=JSON.parse(localStorage.getItem('addtocartcount'));

        }else{
            const counts=await this.getatccounts();

            this.addtocartcount=counts.data.counts;
            localStorage.setItem('addtocartcount',JSON.stringify(counts.data.counts))

        }
        console.log(window.authuser)

    },
    methods:{
        getatccounts(){
            return new Promise((resolve, reject) => {
                axios.get(this.$hostname + "/getatccounts")
                    .then((response) => {
                        console.log(response);
                        resolve(response);
                    });
            });
        }
    }
});
