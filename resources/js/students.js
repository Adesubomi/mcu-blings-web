var apiRouter = require('./mixings/api_router');

Vue.component('students-create', require('./components/StudentsCreate.vue').default);
Vue.component('students-list', require('./components/StudentsList.vue').default);
Vue.component('loader', require('./partials/Loader').default);

const main = new Vue({
    mixins: {apiRouter},
    el: '#mcApp',
    // components: {'students-create'},
});