<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\URL;

class GenerateJsApiFile extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:api-file';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        try {

            $rel_path = 'resources/js/mixings';
            $file_dir = base_path($rel_path);
            $file_name = 'api-router.js';
            $file_path = $file_dir . '/'. $file_name;

            if (!is_dir($file_dir)) {
                mkdir($file_dir, 0777, true);
            }

            file_put_contents($file_path, $this->populateFileContent());

            $this->info('Javascript file for Api Routes has been generated');
            $this->line('    File >> '. $file_name);
            $this->line('    Location >> '. $rel_path);
            $this->line('    Api Routes Found >> '. 'x');
            $this->line('    Web Routes Found >> '. 'y');
        }
        catch (\Exception $exception) {


        }


    }

    private function populateFileContent()
    {
        $api_base = URL::full() .'/api';
        $web_base = URL::full();

        $content = 'Vue.mixin({
    data: function () {
        return {
            api_base: "'. $api_base .'",
            web_base: "'. $web_base .'",
            api_urls: '. $this->populateApiRoutes() .',
            web_urls: '. $this->populateWebRoutes() .',
        }
    },

    methods: {
        '. $this->populateHelperMethods() .'    
    }
});';
        return $content;
    }

    private function populateWebRoutes()
    {
        $web_routes = [];

        $formatted_web_routes = '[
                { method: "get", url: "students/:student_id", name: "students.show", description: "Show a student"},
            ]';

        
        
        return $formatted_web_routes;
    }

    private function populateApiRoutes()
    {
        $formatted_api_routes = '[
                { method: "get", url: "students", name: "students", description: "Get list of students"},
                { method: "post", url: "students/store", name: "students.store", description: "Get list of students"},
                { method: "get", url: "students/show/:student_id", name: "students.show", description: "Get a student"},
                { method: "get", url: "pd/colleges-alt", name: "pd.colleges-alt", description: "Get list of colleges with their departments"},
            ]';

        return $formatted_api_routes;
    }

    private function populateHelperMethods()
    {
        $helper_methods = '
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

            let fUrl = "";

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
                f_url = f_url.replace(`:${paramKey}`, params[paramKey]);
            }

            return f_url;
        },

        _getFullRoute: function (url, base) {
            return `${base}/${url}`;
        },';

        return $helper_methods;
    }
}
