<?php

namespace PikseraPackages\App\Http\Controllers;

use Illuminate\Routing\Controller;
use PikseraPackages\Template\Adapters\RenderHelpers\CsrfTokenRequestInlineJsScriptGenerator;
use PikseraPackages\Template\Adapters\RenderHelpers\ZiggyInlineJsRouteGenerator;
use PikseraPackages\View\View;


class JsCompileController extends Controller
{

    /** @var \PikseraPackages\App\LaravelApplication */
    public $app;

    private $_should_compile_assets = false;

    public function __construct($app = null)
    {
        if (!is_object($this->app)) {
            if (is_object($app)) {
                $this->app = $app;
            } else {
                $this->app = mw();
            }
        }

        if (!mw_is_installed()) {
            $this->_should_compile_assets = false;
        } else {
            $this->_should_compile_assets = \Config::get('piksera.compile_assets');;
        }

        // $this->_should_compile_assets = false; //@todo remove before release
    }


    public function apijs()
    {
        if (!defined('PS_NO_SESSION')) {
            define('PS_NO_SESSION', 1);
        }
        $last_modified_time = 0;

        $file = mw_includes_path() . 'api' . DS . 'api.js';
        if (is_file($file)) {
            $last_modified_time = @filemtime($file);
        }
        if ($last_modified_time) {
            if (defined('PS_V')) {
                $etag = md5($last_modified_time . PS_V);
            } else {
                $etag = $last_modified_time;
            }
        }
        $l = $this->_load_apijs();
        $compile_assets = $this->_should_compile_assets;   //$compile_assets =  \Config::get('piksera.compile_assets');
        if ($compile_assets and defined('PS_V')) {
            // it makes an error
            $l = $this->minify_js($l);

            $userfiles_dir = userfiles_path();
            $hash = $this->apijs_combined_get_hash();
            $userfiles_cache_dir = normalize_path($userfiles_dir . 'cache' . DS . 'apijs');
            $userfiles_cache_filename = $userfiles_cache_dir . 'api.' . $hash . '.' . PS_V . '.js';
            if (!is_file($userfiles_cache_filename)) {
                if (!is_dir($userfiles_cache_dir)) {
                    mkdir_recursive($userfiles_cache_dir);
                }
                if (is_dir($userfiles_cache_dir)) {
                    @touch($userfiles_cache_filename);
                    if (is_writable($userfiles_cache_filename)) {
                        @file_put_contents($userfiles_cache_filename, $l);
                    }
                }
            } else {
                $fmd5 = md5_file($userfiles_cache_filename);
                $fmd = md5($l);
                if ($fmd5 != $fmd) {
                    @touch($userfiles_cache_filename);
                    if (is_writable($userfiles_cache_filename)) {
                        @file_put_contents($userfiles_cache_filename, $l);
                    }
                }
            }
        }
        $response = \Response::make($l);
        $response->header('Content-Type', 'application/javascript');
        if (!$this->app->make('config')->get('app.debug')) {
            // enable caching if in not in debug mode

            if ($last_modified_time) {
                $response->header('Etag', $etag);
                $response->header('Last-Modified', gmdate('D, d M Y H:i:s', $last_modified_time) . ' GMT');
            }
            $response->setTtl(30);
        }

        return $response;
    }


    public function apijs_settings()
    {
        if (!defined('PS_NO_SESSION')) {
            define('PS_NO_SESSION', 1);
        }

        $l = $this->_load_apijs_settings();

        $compile_assets = $this->_should_compile_assets;   //$compile_assets =  \Config::get('piksera.compile_assets');
        if ($compile_assets and defined('PS_V')) {
            $l = $this->minify_js($l);
            $hash = $this->apijs_combined_get_hash();
            $userfiles_dir = userfiles_path();
            $userfiles_cache_dir = normalize_path($userfiles_dir . 'cache' . DS . 'apijs');
            $userfiles_cache_filename = $userfiles_cache_dir . 'api_settings.' . $hash . '.js';

            if (!is_file($userfiles_cache_filename)) {
                if (!is_dir($userfiles_cache_dir)) {
                    mkdir_recursive($userfiles_cache_dir);
                }
                if (is_dir($userfiles_cache_dir)) {
                    @touch($userfiles_cache_filename);
                    if (is_writable($userfiles_cache_filename)) {
                        @file_put_contents($userfiles_cache_filename, $l);
                    }
                }
            } else {
                $fmd5 = md5_file($userfiles_cache_filename);
                $fmd = md5($l);
                if ($fmd5 != $fmd) {
                    @touch($userfiles_cache_filename);

                    if (is_writable($userfiles_cache_filename)) {
                        @file_put_contents($userfiles_cache_filename, $l);
                    }
                }
            }

        }

        $response = \Response::make($l);

        $response->header('Content-Type', 'application/javascript');
        return $response;

    }

    public function apijs_combined_get_hash()
    {
        $suffix = 'public';
        if (is_admin()) {
            $suffix = 'admin';
            if (defined('mw_admin_prefix_url()')) {
                $suffix = 'admin_' . crc32(mw_admin_prefix_url());
            }
        }
        $hash = crc32(site_url() . template_dir() . current_lang()) . '.' . $suffix . '.' . PS_V;

        return $hash;
    }

    public function apijs_combined()
    {
        $userfiles_dir = userfiles_path();
        $hash = $this->apijs_combined_get_hash();
        $userfiles_cache_dir = normalize_path($userfiles_dir . 'cache' . DS . 'apijs_combined');
        $userfiles_cache_filename = $userfiles_cache_dir . 'api.combined.' . $hash . '.js';


        $layout = [];
        $layout[] = $this->_load_apijs_settings();
        $layout[] = $this->_load_apijs();

        $layout = implode("\n\n", $layout);

        $layout = str_replace('{SITE_URL}', $this->app->url_manager->site(), $layout);
        $layout = str_replace('{PS_SITE_URL}', $this->app->url_manager->site(), $layout);
        $layout = str_replace('%7BSITE_URL%7D', $this->app->url_manager->site(), $layout);

        $compile_assets = $this->_should_compile_assets;
        if ($compile_assets and defined('PS_V')) {

            if (!is_dir($userfiles_cache_dir)) {
                mkdir_recursive($userfiles_cache_dir);
            }
            if (is_dir($userfiles_cache_dir)) {
                @touch($userfiles_cache_filename);
                if (is_writable($userfiles_cache_filename)) {

                    @file_put_contents($userfiles_cache_filename, $layout);
                }
            }
        }

        $response = \Response::make($layout);
        $response->header('Content-Type', 'application/javascript');

        return $response;
    }

    public function apijs_liveedit()
    {
        if (!defined('PS_NO_SESSION')) {
            define('PS_NO_SESSION', 1);
        }

        $file = mw_includes_path() . 'api' . DS . 'liveedit.js';

        $last_modified_time = $lastModified = filemtime($file);

        $ifModifiedSince = (isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) ? $_SERVER['HTTP_IF_MODIFIED_SINCE'] : false);
        $etagHeader = (isset($_SERVER['HTTP_IF_NONE_MATCH']) ? trim($_SERVER['HTTP_IF_NONE_MATCH']) : false);
        if (defined('PS_V')) {
            $etag = md5(filemtime($file) . PS_V);
        } else {
            $etag = filemtime($file);
        }


        $l = new View($file);

        $l = $l->__toString();
        $l = str_replace('{SITE_URL}', $this->app->url_manager->site(), $l);
        $l = str_replace('{PS_SITE_URL}', $this->app->url_manager->site(), $l);
        $l = str_replace('%7BSITE_URL%7D', $this->app->url_manager->site(), $l);


        $compile_assets = $this->_should_compile_assets;   //$compile_assets =  \Config::get('piksera.compile_assets');
        if ($compile_assets and defined('PS_V')) {
            $l = $this->minify_js($l);

            $userfiles_dir = userfiles_path();
            $hash = $this->apijs_combined_get_hash();
            $userfiles_cache_dir = normalize_path($userfiles_dir . 'cache' . DS . 'apijs');
            $userfiles_cache_filename = $userfiles_cache_dir . 'api.liveedit.' . $hash . '.js';
            if (!is_file($userfiles_cache_filename)) {
                if (!defined('PS_NO_OUTPUT_CACHE')) {
                    define('PS_NO_OUTPUT_CACHE', true);
                }
                if (!is_dir($userfiles_cache_dir)) {
                    mkdir_recursive($userfiles_cache_dir);
                }
                if (is_dir($userfiles_cache_dir)) {
                    if (is_writable($userfiles_cache_filename)) {
                        @file_put_contents($userfiles_cache_filename, $l);
                    }
                }
            } else {
                $fmd5 = md5_file($userfiles_cache_filename);
                $fmd = md5($l);
                if ($fmd5 != $fmd) {
                    if (is_writable($userfiles_cache_filename)) {
                        @file_put_contents($userfiles_cache_filename, $l);
                    }
                }
            }
        }

        $response = \Response::make($l);
        $response->header('Content-Type', 'application/javascript');
        if (!$this->app->make('config')->get('app.debug')) {
            // enable caching if in not in debug mode
            $response->header('Etag', $etag);
            $response->header('Last-Modified', gmdate('D, d M Y H:i:s', $last_modified_time) . ' GMT');
            $response->setTtl(30);
        }

        return $response;
    }


    public function get_apijs_url()
    {


        $url = $this->app->url_manager->site('apijs') . '?mwv=' . PS_V;
        $compile_assets = $this->_should_compile_assets;   //$compile_assets =  \Config::get('piksera.compile_assets');
        if ($compile_assets and defined('PS_V')) {
            $userfiles_dir = userfiles_path();
            $userfiles_cache_dir = normalize_path($userfiles_dir . 'cache' . DS . 'apijs' . DS);
            $hash = $this->apijs_combined_get_hash();
            $userfiles_cache_filename = $userfiles_cache_dir . 'api.' . $hash . '.js';
            if (is_file($userfiles_cache_filename)) {
                $url = userfiles_url() . 'cache/apijs/' . 'api.' . $hash . '.js';
            }
        }

        return $url;
    }


    public function get_apijs_settings_url()
    {
        $url = $this->app->url_manager->site('apijs_settings') . '?mwv=' . PS_V;;
        $compile_assets = $this->_should_compile_assets;   //$compile_assets =  \Config::get('piksera.compile_assets');


        if ($compile_assets and defined('PS_V')) {
            $userfiles_dir = userfiles_path();
            $file = mw_includes_path() . 'api' . DS . 'api_settings.js';
            $mtime = false;
            if (is_file($file)) {
                $mtime = filemtime($file);
            }

            $hash = $this->apijs_combined_get_hash();

            $userfiles_dir = userfiles_path();
            $userfiles_cache_dir = normalize_path($userfiles_dir . 'cache' . DS . 'apijs');
            $userfiles_cache_filename = $userfiles_cache_dir . 'api_settings.' . $hash . '.js';


            if (is_file($userfiles_cache_filename)) {
                $url = dir2url($userfiles_cache_filename);
            }
        }
        return $url;
    }

    public function get_apijs_combined_url()
    {

        $url = $this->app->url_manager->site('apijs_combined') . '?mwv=' . PS_V;

        $compile_assets = $this->_should_compile_assets;   //$compile_assets =  \Config::get('piksera.compile_assets');

        $userfiles_dir = userfiles_path();
        $hash = $this->apijs_combined_get_hash();
        $userfiles_cache_dir = normalize_path($userfiles_dir . 'cache' . DS . 'apijs_combined');
        $fn = 'api.combined.' . $hash . '.js';
        $userfiles_cache_filename = $userfiles_cache_dir . $fn;
        if ($compile_assets and is_file($userfiles_cache_filename)) {
            $url = userfiles_url() . 'cache/apijs_combined/' . $fn;
        }
        return $url;


    }

    public function get_liveeditjs_url()
    {
        $url = $this->app->url_manager->site('apijs_liveedit') . '?mwv=' . PS_V;
        $compile_assets = $this->_should_compile_assets;   //$compile_assets =  \Config::get('piksera.compile_assets');
        if ($compile_assets and defined('PS_V')) {
            $userfiles_dir = userfiles_path();
            $file = mw_includes_path() . 'api' . DS . 'liveedit.js';
            $mtime = false;
            if (is_file($file)) {
                $mtime = filemtime($file);
            }

            $userfiles_cache_dir = normalize_path($userfiles_dir . 'cache' . DS . 'apijs' . DS);
            $fn = 'api.liveedit.' . md5(site_url() . template_dir() . $mtime) . '.' . PS_V . '.js';
            $userfiles_cache_filename = $userfiles_cache_dir . $fn;
            if (is_file($userfiles_cache_filename)) {
                $url = userfiles_url() . 'cache/apijs/' . $fn;
            }
        }

        return $url;
    }


    public function minify_js($layout)
    {
        return $layout;

        // has error on minifier
        $optimize_asset_loading = get_option('optimize_asset_loading', 'website');
        if ($optimize_asset_loading == 'y') {
            $minifier = normalize_path(PS_PATH . 'Utils/lib/JShrink/Minifier.php', false);
            if (is_file($minifier)) {
                include_once $minifier;


                $layout = \JShrink\Minifier::minify($layout);

            }
        }
        return $layout;
    }


    private function _load_apijs()
    {
        $file = mw_includes_path() . 'api' . DS . 'api.js';
        $l = new View($file);

        $inline_scripts = [];

        $generator = new CsrfTokenRequestInlineJsScriptGenerator();
        $script = $generator->generate();
        $inline_scripts[] = $script;

        $l->assign('inline_scripts', $inline_scripts);

        $l = $l->__toString();
        $l = str_replace('{SITE_URL}', $this->app->url_manager->site(), $l);
        $l = str_replace('{PS_SITE_URL}', $this->app->url_manager->site(), $l);
        $l = str_replace('%7BSITE_URL%7D', $this->app->url_manager->site(), $l);
        return $l;
    }

    private function _load_apijs_settings()
    {
        $file = mw_includes_path() . 'api' . DS . 'api_settings.js';
        if (mw_is_installed()) {
            $ref_page = false;

            if (isset($_REQUEST['id'])) {
                $ref_page = $this->app->content_manager->get_by_id($_REQUEST['id']);
            } elseif (isset($_SERVER['HTTP_REFERER'])) {
                $ref_page = $_SERVER['HTTP_REFERER'];
                if ($ref_page != '') {
                    $ref_page = $this->app->content_manager->get_by_url($ref_page);
                    if (is_array($ref_page)) {
                        $page_id = $ref_page['id'];

                    } else {
                        $page_id = 0;
                    }
                }
            }

            $cat_url = false;
            if (isset($_REQUEST['category_id'])) {
                $cat_url = intval($_REQUEST['category_id']);
            } elseif (isset($_SERVER['HTTP_REFERER'])) {
                $cat_url = mw()->category_manager->get_category_id_from_url($_SERVER['HTTP_REFERER']);
                $cat_url = intval($cat_url);
            }

            if ($cat_url != false) {
                if (!defined('CATEGORY_ID')) {
                    define('CATEGORY_ID', intval($cat_url));
                }
            }
            $this->app->content_manager->define_constants($ref_page);
        }
        if (!defined('TEMPLATE_URL')) {
            define('TEMPLATE_URL', '');
        }

        $inline_scripts = [];

        $l = new View($file);

        $except = ['_debugbar.*', 'ignition.*', 'dusk.*', 'horizon.*', 'l5-swagger.*'];
        if (!is_admin()) {
            $except[] = 'admin.*';
            $except[] = 'api.*';

        }
        config()->set('ziggy.except', $except);

        $ziggy = new ZiggyInlineJsRouteGenerator();
        $jsRoutes = $ziggy->generate();

        $inline_scripts[] = $jsRoutes;


        $l->assign('inline_scripts', $inline_scripts);

        $l = $l->__toString();
        return $l;
    }
}