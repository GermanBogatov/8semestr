<?

namespace Libs;

class App {

    public static $headerCss = array();
    public static $headerJs = array();
    public static $prefix;

    public function __construct($prefix = '/') {

        self::$prefix = $prefix;
        $get_url = isset($_GET['url']) ? htmlspecialchars($_GET['url']) : false;

        if ($get_url) {
            $url = explode("/", rtrim($get_url, "/"));
        } else {
            $url[] = "index";
        }

        $file_controller = __DIR__ . '/..' . $prefix . 'controllers/' . $url[0] . 'Controller.php';

        if (file_exists($file_controller)) {
            require_once $file_controller;

            $class_name = $url[0] . "Controller";

            if (class_exists($class_name)) {
                $controller = new $class_name($prefix);

                if (isset($url[1])) {
                    if (method_exists($controller, $url[1])) {
                        if (isset($url[2])) {
                            $controller->{$url[1]}($url[2]);
                        } else {
                            $controller->{$url[1]}();
                        }
                    } else {
                        self::showError('ERROR! METHOD DOES NOT EXISTS!');
                    }
                } else {
                    $controller->index();
                }
            } else {
                self::showError('Error! Controller dose not exists ser!!!');
            }
        } else {
            self::showError('Error! Controller dose not exists ser!!!');
        }
    }

    static function showError($error) {
        echo $error;
    }

    static function dump($param) {
        echo'<pre style = "background-color: #eee" padding:10px>';
        var_dump($param);
        echo '</pre>';
    }

    static function getCurPage($params = false) {
        $url = $_SERVER["REQUEST_URI"];
        if (!$params && strpos($url, "?")) {
            $url = substr($url, 0, strpos($url, "?"));
        }

        $url = str_replace("index.php", "", $url);

        return $url;
    }

    static function includeComponent($name, $template = "default", $params = array()) {
        $file_path = __DIR__ . '/../components/' . $name . '/class.php';
        if (file_exists($file_path)) {

            require_once $file_path;
            $class_name = 'Components\\' . $name;
            $component = new $class_name($name, $template, $params);
            $component->executComponent();
        } else {
            self::showError("COMPONENT DOES NOT EXISTS");
        }
    }

    static function addHeaderCss($path) {
        self::$headerCss[] = COMPONENT_PATH . $path;
    }

    static function addHeaderJS($path) {
        self::$headerJs[] = COMPONENT_PATH . $path;
    }

    public static function finish($buffer) {
        $css_links = '';
        $js_src = '';
        foreach (self::$headerCss as $css) {
            $css_links .= "<link rel ='stylesheet' href='$css'/> \n";
        }
        foreach (self::$headerJs as $js) {
            $js_src .= "<script src='$js'></script> \n";
        }

        $buffer = str_replace(array("<--#ADD_CSS_PATHS#-->", "<--#ADD_JS_PATHS#-->"), array($css_links, $js_src), $buffer);
        echo $buffer;
    }

    public static function getController($name) {
        $file_controller = __DIR__ . '/..' . self::$prefix . 'controllers/' . $name . 'Controller.php';
        //var_dump($file_controller);
        if (file_exists($file_controller)) {
            require_once $file_controller;
            $class_name = $name . "Controller";
            return $class_name::getInstanse(self::$prefix);
        } else {
            return false;
        }
    }

}
