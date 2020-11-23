
require('./bootstrap');

// required vue
window.Vue = require('vue')
// import  router  from "./router"

Vue.component('mainapp', require('./components/MainApp.vue').default)
// Vue.component('addform', require('./components/AddForm.vue'))

const app = new Vue({
    el: '#app'
    // router
})


