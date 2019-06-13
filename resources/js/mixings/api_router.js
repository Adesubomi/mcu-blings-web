const path = require('path');

Vue.mixin({
    data: function () {
        return {
            api_base: 'http://mcpherson.test/api',
            web_base: 'http://mcpherson.test',
            api_urls: [
                { method: 'get', url: 'students', name: 'students', description: 'Get list of students'},
                { method: 'post', url: 'students/store', name: 'students.store', description: 'Get list of students'},
                { method: 'get', url: 'students/show/:student_id', name: 'students.show', description: 'Get a student'},
                { method: 'get', url: 'pd/colleges-alt', name: 'pd.colleges-alt', description: 'Get list of colleges with their departments'},
            ],
            web_urls: [
                { method: 'get', url: 'students/:student_id', name: 'students.show', description: 'Show a student'},
            ]
        }
    },

    methods: {

        web: function (name, params) {

            let f_url = this._getRouteByName(name, this.web_urls);

            f_url = this._parseRouteParams(f_url, params);
            f_url = this._getFullRoute(f_url, this.web_base);
            return f_url;
        },

        api: function (name, params) {

            let f_url = this._getRouteByName(name, this.api_urls);

            f_url = this._parseRouteParams(f_url, params);
            f_url = this._getFullRoute(f_url, this.api_base);
            return f_url;
        },

        _getRouteByName: function (name, api_urls) {

            let fUrl = '';

            let fUrls = api_urls.filter(el => el.name == name);

            if (fUrls.length > 0) {
                fUrl = fUrls[0];
            }
            else {
                console.error(`Route [${name}] is not defined.`);
            }

            return fUrl.url;
        },

        _parseRouteParams: function (url, params) {

            let f_url = url;

            if (params == undefined || params == null) return f_url;

            let paramKeys = Object.keys(params);

            for (let paramKey of paramKeys) {
                f_url = f_url.replace(':' + paramKey, params[paramKey]);
            }

            return f_url;
        },

        _getFullRoute: function (url, base) {
            return base +'/'+ url;
        },
    }
});