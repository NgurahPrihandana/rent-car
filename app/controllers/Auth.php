<?php

class Auth extends Controller   {

    public function index()
    {
        if ( !isset($_POST['login']) ) {
            $this->view('templates/auth/header');
            $this->view('auth/login');
            $this->view('templates/auth/footer');
        } else {
            $this->model('Auth_model')->login($_POST);
        }
    }

    public function logout()
    {
      session_start();
      $_SESSION = [];
      session_unset();
      session_destroy();

      header('Location: '.BASEURL.'/auth/login');
    }

    public function register()
    {
        if ( !isset($_POST['register']) ) {
            $this->view('templates/auth/header');
            $this->view('auth/register');
            $this->view('templates/auth/footer');
        } else {
            if($this->model('Auth_model')->register($_POST) > 0)    {
                header("Location: " .BASEURL ."/auth/login");
            }
        }
    }

}