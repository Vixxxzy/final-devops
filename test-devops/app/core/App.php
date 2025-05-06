<?php
class App {
    // Global properties
    public $controller = 'login';
    public $method = 'index';
    public $parameter = [];

    // Constructor
    public function __construct() {
        $url = $this->parseURL();

        // Handle controller
        if (!empty($url) && file_exists('../app/controller/' . $url[0] . '.php')) {
            $this->controller = $url[0];
            unset($url[0]);
        }

        // Load controller file
        require_once '../app/controller/' . $this->controller . '.php';
        $this->controller = new $this->controller; // Instantiate controller object

        // Handle method
        if (isset($url[1])) {
            $method = $url[1];
            if (!$this->startsWith($method, '_') && method_exists($this->controller, $method)) {
                $this->method = $method;
                unset($url[1]);
            }
        }

        // Handle parameters
        $this->parameter = $url ? array_values($url) : [];

        // Call the controller method with parameters
        call_user_func_array([$this->controller, $this->method], $this->parameter);
    }

    // Parse URL into controller/method/params
    private function parseURL() {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            return explode('/', $url);
        }
        return [];
    }

    // Helper to check if string starts with a given prefix
    private function startsWith($str, $prefix) {
        return strpos($str, $prefix) === 0;
    }
}
