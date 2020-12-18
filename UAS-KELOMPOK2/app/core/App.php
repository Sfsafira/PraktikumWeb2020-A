<?php

class App
{
    protected $controller = 'Home';
    protected $method = 'index';
    protected $parameter = [];

    public function __construct()
    {
        $url = $this->mecahUrl();
        if (empty($url)) {
            $url[0] = $this->controller;
            $url[1] = $this->method;
        }
        //nyari ke kontroller
        if (file_exists('../app/controllers/' . $url[0] . '.php')) {
            $this->controller = $url[0];
            unset($url[0]);
        }
        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        //nyari method
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        //nyari parameter
        if (!empty($url)) {
            $this->parameter = array_values($url);
        }

        //jalankan controller sm method dan kirim parameternya
        call_user_func_array([$this->controller, $this->method], $this->parameter);
    }

    public function mecahUrl()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            //proteksi url
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}
