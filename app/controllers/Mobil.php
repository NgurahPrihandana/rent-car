<?php 

    class Mobil extends Controller
    {
        public function index()
        {
            $data['judul'] = 'Data Mobil';
            $data['as'] = $this->model('Member_model')->getAllMember();
            $data['jenis'] = $this->model('Mobil_model')->getAllJenis();
            $data['mobil'] = $this->model('Mobil_model')->getAllMobil();
            $data['peminjaman'] = $this->model('Peminjaman_model')->getAllPeminjaman();
            $this->view('templates/header');
            $this->view('templates/sidebar');
            $this->view('templates/topbar', $data);
            $this->view('mobil/index',$data);
            $this->view('templates/footer');
        }

        public function tambah()
        {
            if($this->model('Mobil_model')->tambahMobil($_POST) > 0) {
                Flasher::setFlash('berhasil', 'ditambahkan', 'success');
                header('Location: ' . BASEURL . '/mobil');
            } else {
                Flasher::setFlash('gagal', 'ditambahkan', 'danger');
                header('Location: ' . BASEURL . '/mobil');
            }
                
        }

        public function edit($id) {
            $data['judul'] = 'Ubah Data Mobil';
            $data['getSpcMobil'] = $this->model('Mobil_model')->getSpcMobil($id);
            $data['jenis'] = $this->model('Mobil_model')->getAllJenis();
            $this->view('templates/header',$data);
            $this->view('templates/sidebar',$data);
            $this->view('templates/topbar',$data);
            $this->view('mobil/edit',$data);
            $this->view('templates/footer',$data);
        }

        public function runEdit() {
            if($this->model('Mobil_model')->editMobil($_POST) > 0) {
                Flasher::setFlash('berhasil','dirubah','success');
                header('Location: ' . BASEURL . "/mobil");  
            } else {
                Flasher::setFlash('gagal','dirubah','danger');
                header('Location: ' . BASEURL . "/mobil");
            }
        }

        public function hapus($id)
        {
            if($this->model('Mobil_model')->hapusMobil($id) > 0) {
                Flasher::setFlash('berhasil', 'dihapus', 'success');
                header('Location: ' . BASEURL . '/mobil');
            } else {
                Flasher::setFlash('gagal', 'dihapus', 'success');
                header('Location: ' . BASEURL . '/mobil');
            }
        }
    }

?>