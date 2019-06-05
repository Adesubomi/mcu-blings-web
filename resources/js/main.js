require('./bootstrap');
import Snotify, { SnotifyPosition } from 'vue-snotify'


window.Vue = require('vue');

Vue.use(Snotify, {
    toast: {
        position: SnotifyPosition.centerBottom,
        timeout: 4600,
        showProgressBar: false,
    },
    global: {
        maxAtPosition: 1,
        maxOnScreen: 1,
    }
});