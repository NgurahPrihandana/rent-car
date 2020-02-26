<?php

class App {
    protected $controller = 'dashboard';
    protected $method = 'index';
    protected $params = [];

    public function __construct() {
        $url = $this->parseURL();

        // controller
        if(file_exists('../app/controllers/' .$url[0] . '.php')) {
            $this->controller = $url[0];
            unset($url[0]);
        }

        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        // method
        if(isset($url[1])) {
            if(method_exists($this->controller,$url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // params
        if( !empty($url)) {
            $this->params = array_values($url);
        }

        // Jalankan Controller dan method, serta kirimkan params(parameter) jika ada
        call_user_func_array([$this->controller,$this->method],$this->params);

    }

    public function parseURL()
    {
        // Jika ada url yang dikirimkan
        if( isset($_GET['url'])) {
            // Bersihkan Url dari tanda '/' diakhir url
            $url = rtrim($_GET['url'],'/');
            // Bersihkan Url dari karakter yang aneh
            $url = filter_var($url, FILTER_SANITIZE_URL);
            // Pecahkan Url dan masukkan kedalam sebuah array numeric dengan delimiternya dalah '/'
            $url = explode('/',$url);
            return $url;
        }
    }
}