<?php 

    class User extends Controller
    {

        public function index()
        {
            $data['judul'] = "Welcome Admin";
            $this->view('templates/header',$data);
            $this->view('templates/user/sidebar',$data);
            $this->view('templates/topbar',$data);
            $this->view('user/index',$data);
            $this->view('templates/footer',$data);
        }

        public function member()
        {
            $data['judul'] = "Welcome Admin";
            $data['as'] = $this->model('Member_model')->getAllMember();
            $this->view('templates/header',$data);
            $this->view('templates/user/sidebar',$data);
            $this->view('templates/topbar',$data);
            $this->view('user/member',$data);
            $this->view('templates/footer',$data);
        }
    }



?>