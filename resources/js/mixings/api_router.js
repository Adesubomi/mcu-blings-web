const path = require('path');

Vue.mixin({
    data: function () {
        return {
            base_url: 'http://mcpherson.test/api',
            urls: [
                {method: 'get', url: 'students', name: 'students', description: 'Get list of students'},
                {method: 'post', url: 'students/store', name: 'students.store', description: 'Get list of students'},
                {method: 'get', url: 'students/show/:student_id', name: 'students.show', description: 'Get a student'},
                {method: 'get', url: 'pd/colleges-alt', name: 'pd.colleges-alt', description: 'Get list of colleges with their departments'},
            ]
        }
    },

    methods: {

        api: function (name, params) {

            let fUrl = this._getRouteByName(name);

            fUrl = this._parseRouteParams(fUrl, params);
            fUrl = this._getFullRoute(fUrl);
            return fUrl;
        },

        _getRouteByName: function (name) {

            let fUrl = '';

            let fUrls = this.urls.filter(el => el.name == name);

            if (fUrls.length > 0) {
                fUrl = fUrls[0];
            }
            else {
                console.error(`Route [${name}] is not defined.`);
            }

            return fUrl.url;
        },

        _parseRouteParams: function (url, params) {

            let fUrl = url;

            if (params == undefined || params == null) return fUrl;

            let paramKeys = Object.keys(params);

            for (let paramKey of paramKeys) {
                fUrl = fUrl.replace(':' + paramKey, params[paramKey]);
            }

            return fUrl;
        },

        _getFullRoute: function (url) {
            return this.base_url +'/'+ url;
        },
    }
});