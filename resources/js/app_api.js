export default {
    install(Vue, options) {

        Vue.prototype.$myMethod = function () {
            console.log('An Instance method');
        };
    }
};