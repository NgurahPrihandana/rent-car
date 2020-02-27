<?php 

    class User extends Controller
    {

        public function index()
        {
            $data['judul'] = "Welcome Admin";
            $data['as'] = $this->model('Member_model')->getAllMember();
            $data['mobil'] = $this->model('Mobil_model')->getAllMobil();
            $data['peminjaman'] = $this->model('Peminjaman_model')->getAllPeminjaman();
            $data['pengembalian'] = $this->model('Pengembalian_model')->getAllPengembalian();
            $this->view('templates/header',$data);
            $this->view('templates/user/sidebar',$data);
            $this->view('templates/topbar',$data);
            $this->view('user/index',$data);
            $this->view('templates/footer',$data);
        }

        public function member()
        {
            $data['judul'] = "Member Detail";
            $data['as'] = $this->model('Member_model')->getAllMember();
            $this->view('templates/header',$data);
            $this->view('templates/user/sidebar',$data);
            $this->view('templates/topbar',$data);
            $this->view('user/member',$data);
            $this->view('templates/footer',$data);
        }

        public function detail_member($id)
        {
            $data['judul'] = "Welcome Admin";
            $data['getSpcMember'] = $this->model('Member_model')->getSpcMember($id);
            $data['spcMemberPeminjaman'] = $this->model('User_model')->getSpcMemberPeminjaman($id);
            $this->view('templates/header',$data);
            $this->view('templates/user/sidebar',$data);
            $this->view('templates/topbar',$data);
            $this->view('user/detail_member',$data);
            $this->view('templates/footer',$data);
        }

        public function pekerja()
        {
            $data['judul'] = "Detail Pekerja";
            $data['auth'] = $this->model('Auth_model')->getAllAuth();
            $this->view('templates/header',$data);
            $this->view('templates/user/sidebar',$data);
            $this->view('templates/topbar',$data);
            $this->view('user/pekerja',$data);
            $this->view('templates/footer',$data);
        }
    }



?>