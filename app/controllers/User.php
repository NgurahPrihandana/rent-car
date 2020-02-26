<?php 

    class User extends Controller
    {

        public function index()
        {
            $data['judul'] = "Welcome Admin";
            $this->view('templates/header',$data);
            $this->view('user/template/sidebar',$data);
            $this->view('templates/topbar',$data);
            $this->view('user/index',$data);
            $this->view('templates/footer',$data);
        }
    }



?>