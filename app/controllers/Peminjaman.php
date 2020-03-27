<?php 

    class Peminjaman extends Controller
    {
        public function index()
        {
            $data['judul'] = 'Peminjaman';
            $data['as'] = $this->model('Member_model')->getAllMember();
            $data['jenis'] = $this->model('Mobil_model')->getAllJenis();
            $data['mobil'] = $this->model('Mobil_model')->getAllMobil();
            $data['spc_mobil'] = $this->model('Mobil_model')->getSpecifiedMobil();
            $data['peminjaman'] = $this->model('Peminjaman_model')->getAllPeminjaman();
            $data['auth'] = $this->model('Auth_model')->getAllAuth();
            $this->view("templates/header",$data);
            $this->view("templates/sidebar",$data);
            $this->view("templates/topbar",$data);
            $this->view("peminjaman/index",$data);
            $this->view("templates/footer",$data);
        }
        
        public function tambah()
        {
            if($this->model('Peminjaman_model')->tambahPeminjaman($_POST)) {
                Flasher::setFlash('berhasil','ditambahkan','success');
                if($_SESSION['role'] == "2")  {
                    header('Location: ' . BASEURL . '/peminjaman');
                  }else {
                      header('Location:' .BASEURL. '/user/peminjaman');
                  }
            } else {
                Flasher::setFlash('gagal','ditambahkan','danger');
                if($_SESSION['role'] == "2")  {
                    header('Location: ' . BASEURL . '/peminjaman');
                  }else {
                      header('Location:' .BASEURL. '/user/peminjaman');
                  }
            }
        }

        public function hapus($id)
        {
            if($this->model('Peminjaman_model')->hapusPeminjaman($id)) {
                Flasher::setFlash('berhasil','dihapus','success');
                if($_SESSION['role'] == "2")  {
                    header('Location: ' . BASEURL . '/peminjaman');
                  }else {
                      header('Location:' .BASEURL. '/user/peminjaman');
                  }
            } else {
                Flasher::setFlash('gagal','dihapus','danger');
                if($_SESSION['role'] == "2")  {
                    header('Location: ' . BASEURL . '/peminjaman');
                  }else {
                      header('Location:' .BASEURL. '/user/peminjaman');
                  }
            }
        }

        public function edit($id)
        {
            $data['judul'] = 'Ubah Data Peminjaman';
            $data['getSpcPeminjaman'] = $this->model('Peminjaman_model')->getSpcPeminjaman($id);
            $data['as'] = $this->model('Member_model')->getAllMember();
            $data['mobil'] = $this->model('Mobil_model')->getAllMobil();
            $this->view('templates/header',$data);
            $this->view('templates/sidebar',$data);
            $this->view('templates/topbar',$data);
            $this->view('peminjaman/edit',$data);
            $this->view('templates/footer',$data);
        }

        public function runEdit() {
            if($this->model('Peminjaman_model')->editPeminjaman($_POST) > 0) {
                Flasher::setFlash('berhasil','dirubah','success');
                if($_SESSION['role'] == "2")  {
                    header('Location: ' . BASEURL . '/peminjaman');
                  }else {
                      header('Location:' .BASEURL. '/user/peminjaman');
                  }
            } else {
                Flasher::setFlash('gagal','dirubah','danger');
                if($_SESSION['role'] == "2")  {
                    header('Location: ' . BASEURL . '/peminjaman');
                  }else {
                      header('Location:' .BASEURL. '/user/peminjaman');
                  }
            }
        }

        public function done($id,$id_mobil)
        {
            if($this->model('Peminjaman_model')->donePeminjaman($id,$id_mobil) > 0 ) {
                Flasher::setFlash('berhasil','dikembalikan','success');
                if($_SESSION['role'] == "2")  {
                    header('Location: ' . BASEURL . '/peminjaman');
                  }else {
                      header('Location:' .BASEURL. '/user/peminjaman');
                  }
            } else {
                Flasher::setFlash('gagal','dikembalikan','danger');
                if($_SESSION['role'] == "2")  {
                    header('Location: ' . BASEURL . '/peminjaman');
                  }else {
                      header('Location:' .BASEURL. '/user/peminjaman');
                  }
            }
        }

    }

?>