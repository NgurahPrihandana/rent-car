<?php

class Member extends Controller {

    public function index() {
        $data['judul'] = 'Member';
        $data['as'] = $this->model('Member_model')->getAllMember();
        $data['mobil'] = $this->model('Mobil_model')->getAllMobil();
        $data['peminjaman'] = $this->model('Peminjaman_model')->getAllPeminjaman();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar');
        $this->view('templates/topbar',$data);
        $this->view('member/index', $data);
        $this->view('templates/footer');
    }

    public function tambah() {
        if($this->model('Member_model')->tambahMember($_POST) > 0) {
            Flasher::setFlash('berhasil','ditambahkan','success');
            if($_SESSION['role'] == "2")  {
                header('Location: ' . BASEURL . '/Member');
              }else {
                  header('Location:' .BASEURL. '/user/member');
              }
            exit;
        }else {
            Flasher::setFlash('gagal','ditambahkan','danger');
            if($_SESSION['role'] == "2")  {
                header('Location: ' . BASEURL . '/Member');
              }else {
                  header('Location:' .BASEURL. '/user/member');
              }
            exit;
        }
    }

    public function edit($id) {
        $data['judul'] = 'Ubah Data Member';
        $data['getSpcMember'] = $this->model('Member_model')->getSpcMember($id);
        $this->view('templates/header',$data);
        $this->view('templates/sidebar',$data);
        $this->view('templates/topbar',$data);
        $this->view('member/edit',$data);
        $this->view('templates/footer',$data);
    }

    public function runEdit() {
        if($this->model('Member_model')->editMember($_POST) > 0) {
            Flasher::setFlash('berhasil','dirubah','success');
            if($_SESSION['role'] == "2")  {
                header('Location: ' . BASEURL . '/Member');
              }else {
                  header('Location:' .BASEURL. '/user/member');
              }
        } else {
            Flasher::setFlash('gagal','dirubah','danger');
            if($_SESSION['role'] == "2")  {
                header('Location: ' . BASEURL . '/Member');
              }else {
                  header('Location:' .BASEURL. '/user/member');
              }
        }
    }

    public function hapus($id) {
        if($this->model('Member_model')->hapusMember($id) > 0) {
            Flasher::setFlash('berhasil','dihapus','success');
            if($_SESSION['role'] == "2")  {
                header('Location: ' . BASEURL . '/Member');
              }else {
                  header('Location:' .BASEURL. '/user/member');
              }
            exit;
        } else {
            if($_SESSION['role'] == "2")  {
                header('Location: ' . BASEURL . '/Member');
              }else {
                  header('Location:' .BASEURL. '/user/member');
              }
            header('Location:' . BASEURL . '/Member');
        }
    }
}
